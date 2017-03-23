<?php
namespace App\Http\Controllers\Admin;

set_time_limit(0);

use App\Models\Backup;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\BackupService;
use Illuminate\Http\Request;
use Excel;
use Mockery\CountValidator\Exception;
use SplFileObject;
use Image as InterventionImg;
use Image;
use Config;
/**
 * Class ArticlesController
 * @package App\Http\Controllers\Admin
 */
class TransferController extends AdminController
{
	protected $importPath;

	protected $backup;

	protected $attachmentsPath;

	protected $exportFilePath;

	/**
	 * @param BackupService $backup
	 */
	public function __construct(BackupService $backup)
	{
		if('local' == app()->environment()) {
			// for local images,files etc
			Config::set('app.url', 'http://localhost:8000');
		}

		$this->attachmentsPath = public_path('images/products');
		$this->importPath = storage_path('imports');
		$this->backup = $backup;

		parent::__construct();
	}

	//	public function __destruct()
	//	{
	//		@unlink($this->exportFilePath);
	//	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.imports.index')->withBackup(Backup::all());
	}


	public function create()
	{
	}

	public function store(Request $request)
	{
		if($request->hasFile('import')) {
			$extension = $request->file('import')->getClientOriginalExtension();

			try {
				switch ($extension) {
					case 'xls' :
					case 'xlsx':
						$this->backup->prepare();
						$this->handleXlsFile($request);
						break;
					case 'csv':
						$this->backup->prepare($allDb = true);
						$this->handleCsvFile($request);
						break;
					default:
						throw new Exception('Нудопустимый тип файла!');
						break;
				}

				return redirect()->back()->with('message', 'Данные успешно импортированы!')->withSuccess(true);

			} catch (Exception $e) {
				return redirect()->back()->with('message', $e->getMessage())->withSuccess(false);
			}
		}
		return redirect()->back()->with('message', 'Файл импорта отсутствует!')->withSuccess(false);
	}

	public function export()
	{
		$products = Product::with(['images','category','brand'])->get();

		$this->exportFilePath = sys_get_temp_dir() . '/export.csv';

		$stream = fopen($this->exportFilePath, 'w');

		$prepareForImport = [];
		$prepareForImport[0] ='Артикул товара';
	    $prepareForImport[1] ='Название товара';
	    $prepareForImport[2] ='Категория товара';
	    $prepareForImport[3] ='Ссылка на товар';
	    $prepareForImport[4] ='Цена товара';
	    $prepareForImport[5] ='Скидка на товар';
	    $prepareForImport[6] ='Товар в наличии?';
		$prepareForImport[7] ='Бренд';
	    $prepareForImport[8] ='Опубликован ли товар?';
		$prepareForImport[9] ='Хит продаж?';
		$prepareForImport[10] ='Новинка?';
		$prepareForImport[11] ='Оценка продукта';
	    $prepareForImport[12] ='Упаковка';
	    $prepareForImport[13] ='Краткое описание';
	    $prepareForImport[14] = 'Полное описание';
		$prepareForImport[15] ='Пути к изображениям товара(через запятую, первое указанное изображение — главное по умолчанию)';
	    $prepareForImport[16] ='Путь к pdf файлу';
	    $prepareForImport[17] ='Путь к файлу 3d';
	    $prepareForImport[18] ='Код видео';
	    $prepareForImport[19] ='Мета заголовок';
	    $prepareForImport[20] ='Мета описание';
	    $prepareForImport[21] ='Ключевые слова';

		fputcsv($stream,$prepareForImport, ",");



		foreach($products as $product)
		{
			$prepareForImport = [];
			$prepareForImport[0] = $product->article;
			$prepareForImport[1] = $product->title;
			$prepareForImport[2] = isset($product->category->title) ? $product->category->title : ' - ';
			$prepareForImport[3] = $product->slug;
			$prepareForImport[4] = $product->price;
			$prepareForImport[5] = $product->discount;
			$prepareForImport[6] = $product->is_stock;
			$prepareForImport[7] = array_get($product->brand,'title','');
			$prepareForImport[8] = $product->active;
			$prepareForImport[9] = $product->is_bestseller;
			$prepareForImport[10] = $product->is_new;
			$prepareForImport[11] = $product->rating;
			$prepareForImport[12] = $product->pack;
			$prepareForImport[13] = $product->excerpt;
			$prepareForImport[14] = $product->body;

			// images
			$images = array_pluck($product->images,'path');

			$prepareForImport[15] = implode(',',$images);
			$prepareForImport[16] = $product->pdf;
			$prepareForImport[17] = $product->flash_view;
			$prepareForImport[18] = $product->video;
			$prepareForImport[19] = $product->meta_title;
			$prepareForImport[20] = $product->meta_description;
			$prepareForImport[21] = $product->meta_keywords;

			fputcsv($stream,$prepareForImport,",");
		}

		fputcsv($stream,[],",");
		fclose($stream);

		$filename = date('Y-m-d-') . 'export.csv';

		return response()->download($this->exportFilePath, $filename);
	}

	/**
	 *  Rollback last backup
	 */
	public function rollBack()
	{
		if($this->backup->rollback()) {
			return redirect()->route('transfer.index')->with('message','Успех!')->with('success',true);
		}

		return redirect()->route('transfer.index')->with('message','Ошибка при чтении файла резервной копии!')->with('success',false);
	}

	protected function handleCsvFile(Request $request)
	{
		$importFileName = time() . '.csv';
		$importFilePath = $this->importPath. '/' . $importFileName;
		$request->file('import')->move($this->importPath, $importFileName);

		$file = new SplFileObject($importFilePath);

		while ( ! $file->eof()) {
			$content = $file->fgetcsv(",");

			$content = array_map(function($v){
				return trim(preg_replace('/\^/','',$v));
			}, $content);
			if(
				count($content) <=1                  or // IF EOF
				in_array('Артикул товара', $content) or
				in_array('Название товара',$content) or
				in_array('Цена товара',$content)     or
				in_array('Скидка на товар',$content)
			) {
				continue;
			}
			$readyForUpdate = [];
			$readyForUpdate['article'] = $content[0];
			$readyForUpdate['title'] = $content[1];
			$readyForUpdate['category_id'] = Category::findOrCreate($content[2]);
			$readyForUpdate['slug'] = str_slug($content[3],'-');
			$readyForUpdate['price'] = preg_replace('/[^\d.]+/','',$content[4]);
			$readyForUpdate['discount'] = floatval($content[5]);
			$readyForUpdate['is_stock'] = (int) trim($content[6]);
			$readyForUpdate['brand_id'] = Brand::findOrCreate($content[7]);
			$readyForUpdate['active'] = (int) trim($content[8]);
			$readyForUpdate['is_bestseller'] = (int) $content[9];
			$readyForUpdate['is_new'] = (int) $content[10];
			$readyForUpdate['rating'] = floatval($content[11]);
			$readyForUpdate['pack'] = $content[12];
			$readyForUpdate['excerpt'] = $content[13];
			$readyForUpdate['body'] = $content[14];

			$readyForUpdate['video'] = $content[18]; // iframe code
			$readyForUpdate['meta_title'] = $content[19];
			$readyForUpdate['meta_description'] = $content[20];
			$readyForUpdate['meta_keywords'] = $content[21];

			// 14 is empty in csv file
			//$readyForUpdate['images'] = ''; // images 15

			$readyForUpdate['pdf'] = $content[16]; // $this->saveFile($content[16]); // ''; // pdf  16
			$readyForUpdate['flash_view'] = $content[17]; // 3D view 17

			$attachments = array_filter(explode(',',$content[15]), 'trim');

			$attachments = $this->saveAttach($attachments);

			Product::createOrUpdate($readyForUpdate,$attachments);
		}

		// delete file
		@unlink($importFilePath);
	}

	protected function handleXlsFile(Request $request)
	{
		if ($request->hasFile('import')) {

			$importFileName = time() . '-' . $request->file('import')->getClientOriginalName();
			$importFilePath = storage_path('imports') . '/' . $importFileName;
			$request->file('import')->move(storage_path('imports'), $importFileName);

			chmod($importFilePath, 777);

			Excel::selectSheetsByIndex(0)->load($importFilePath, function ($row) {
				$categoryId = null;
				$statistics = [
					'categories' => ['update' => 0, 'create' => 0],
					'products' => ['update' => 0, 'create' => 0],
				];

				$row->each(function ($ceil) use (&$categoryId, &$statistics) {

					print_r($ceil);
					echo "\n";

					if ($ceil->artikul === null && strlen($ceil->naimenovanie)) {
							dd("1");
						// category
						$category = Category::where('title', $ceil->naimenovanie)->first();
						if (!$category) {
							$category = Category::create([
								'title' => $ceil->naimenovanie,
								'slug' => str_slug($ceil->naimenovanie, '-'),
								'show' => 0,
								'is_import' => 1,
							]);
							$categoryId = $category->id;
						} else {
							dd("1.1");
							$categoryId = $category->id;
						}
					} else if ($ceil->artikul !== null && strlen($ceil->naimenovanie)) {					
					dd("2");	
						// product
						$product = Product::where('article', $ceil->artikul)
							->orWhere('title', $ceil->naimenovanie)
							->first();
						$readyForUpdate = [
							'article' => $ceil->artikul,
							'title' => $ceil->naimenovanie,
							'category_id' => $categoryId,
							'price' => floatval($ceil->tsena),
							'discount' => preg_replace('/[^\d]+/', '', $ceil->aktsiya),
							'slug' => str_slug($ceil->naimenovanie, '-'),
						];

						if (!$product) {
							$readyForUpdate['is_import'] = 1;
							Product::create($readyForUpdate);
						} else {
							$product->update($readyForUpdate);
						}
					}
					dd("end");
				});
			});
			// delete unnecessary file
			@unlink($importFilePath);
		}
	}

	protected function saveAttach(array $images = [])
	{
		$attachments = [];

		foreach($images as $key=>$image) {
			$readyForCreate = [];

			try {
				$readyForCreate['is_thumb'] = ((int)$key === 0) ? 1 : 0;
				$readyForCreate['path'] = $image;

				$img = \App\Models\Image::create($readyForCreate);

				$attachments[] = $img->id;

			} catch (\Exception $e) {
				//
			}
		}
		return $attachments;
	}

	protected function saveAttachCopy(array $images = [])
	{
		$mimeTypes = [
			'image/gif'  => 'gif',
			'image/png'  => 'png',
			'image/jpeg' => 'jpg',
			'image/pjpeg' =>'jpg',
		];

		$attachments = [];

		foreach($images as $key=>$image) {
			$readyForCreate = [];
			try {
				$image = InterventionImg::make($image);
				$extension = array_get($mimeTypes,$image->mime) ? : 'jpg';

				do {
					// generate uniquer file name
					$fileName = date('Y-m-d-') . str_random() . '.' .$extension;
				} while(file_exists($this->attachmentsPath . '/' . $fileName));

				$image->save($this->attachmentsPath . '/' . $fileName);

				$readyForCreate['path'] = str_replace(public_path(''),'',$this->attachmentsPath) . '/' . $fileName;
				$readyForCreate['is_thumb'] = ((int)$key === 0) ? 1 : 0;

				$img = \App\Models\Image::create($readyForCreate);

				$attachments[] = $img->id;

			} catch (\Exception $e) {
				//
			}
		}
		return $attachments;
	}

	protected function saveFile($fileLink = '')
	{
		$fileName = null;
		$filePath = null;
		$fileLink = trim($fileLink);

		if( $fileLink )
		{
			$headers = @get_headers($fileLink,1);

			if($headers) {
				$fileName = pathinfo($fileLink,PATHINFO_BASENAME);
				$filePath = "files/{$fileName}";
				file_put_contents(public_path($filePath),$this->getExternalFile($fileLink));
				return $filePath;
			}
		}

		return '';
	}

	protected function getExternalFile($url)
	{
		$url = str_replace ( ' ', '%20',$url);

		if(function_exists('curl_init')) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
			curl_setopt($ch, CURLOPT_URL, $url);
			$data = curl_exec($ch);
			curl_close($ch);
		} else {
			$data = file_get_contents($url);
		}

		return $data;
	}
}
