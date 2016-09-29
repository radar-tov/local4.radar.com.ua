<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductImage;
use App\Services\FilesHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

/**
 * Class ProductImagesController
 * @package App\Http\Controllers\Admin
 */
class ProductImagesController extends Controller {


	/**
	 * @var FilesHandler
	 */
	private $filesHandler;
	/**
	 * @var string
	 */
	private $path = "images/";

	/**
	 * @param FilesHandler $filesHandler
	 */
	function __construct(FilesHandler $filesHandler)
	{
		$this->filesHandler = $filesHandler;
	}

	/**
	 * @param Request $request
	 * @return string
	 * @internal param $productId
	 */
	public function uploadImage(Request $request)
	{
		
		//$product = Product::find($request->get('product_id'));
		$request = $this->filesHandler->saveFile($request, $this->path);
		$request->merge(['is_thumb' => 0]);
		$image = ProductImage::create($request->all());
		//$product->images()->attach($image->id);

		return \Response::json($image->toArray());
	}

	/**
	 * @param $imageId
	 */
	public function removeImage($imageId)
	{
		$image = ProductImage::findOrFail($imageId);
		$file = public_path($image->path);

		if(File::exists($file)) File::delete($file);

		$image->delete();
	}

	/**
	 * @param integer $productId
	 * @return null
	 */
	public function getProductImages($productId)
	{
		$images = ProductImage::whereHas("products", function($product) use($productId){
			$product->where('id', $productId);
		})
		->get(["id", "path", "is_thumb",'is_certificate']);


		if(count($images)) return $images;

		return null;
	}

	public function setThumbnail($imageId, Request $request)
	{
		$image = ProductImage::find($imageId);

		ProductImage::has('products', '=', 0)->update(["is_thumb" => false]);

		ProductImage::whereHas('products', function($product) use($request){
			$product->where('id', $request->get('productId'));
		})
		->update(["is_thumb" => false]);

		$image->update(["is_thumb" => true]);
	}


}
