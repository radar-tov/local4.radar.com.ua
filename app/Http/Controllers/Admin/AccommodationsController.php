<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccommodationRequest;
use App\Http\Requests\UpdateAccommodationRequest;
use App\Models\Accommodation;
use App\Models\AccommodationImage;
use App\Models\Category;
use App\Models\Filter;
use App\Services\AccommodationComposer;
use App\Services\FilesHandler;
use Illuminate\Http\Request;

class AccommodationsController extends AdminController
{
	/**
	 * @var FilesHandler
	 */
	private $filesHandler;
	/**
	 * @var AccommodationComposer
	 */
	private $accommodationComposer;

	function __construct(FilesHandler $filesHandler, AccommodationComposer $accommodationComposer)
	{
		$this->filesHandler = $filesHandler;
		$this->accommodationComposer = $accommodationComposer;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$this->removeEmptyAccommodations();

		$search = $request->get('q');

		if($request->has('q')) {
			$query = $this->prepareSearch($request->get('q'));

			$accommodations = Accommodation::where('title','like', $query)
				->orWhere('description', 'like', $query)
				->orWhere('article','like',$query)
				->paginate(20);
		} else {
			$accommodations = Accommodation::paginate(20);
		}

		$accommodations->load("city","category");
		$categories = [0=>'Не выбрано'] + Category::where('parent_id', '<>', 0)->lists('title','id');

		return view("admin.accommodations.index", compact("accommodations", 'categories', 'search'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->removeEmptyAccommodations();
		$accommodation = Accommodation::create([]);

		return view("admin.accommodations.create", compact("accommodation"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param AccommodationRequest|Request $request
	 * @return Response
	 */
	public function store(AccommodationRequest $request)
	{
		$requestData = $this->accommodationComposer->prepareRequestData($request->all());

		Accommodation::create($requestData);
		return redirect()->route("dashboard.accommodations.index");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$accommodation = Accommodation::with('metroStation','area','city','town','images','houseClass')->find($id);

		return view("admin.accommodations.edit", compact("accommodation", 'category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @param UpdateAccommodationRequest|Request $request
	 * @return Response
	 */
	public function update($id, AccommodationRequest $request)
	{
		$requestData = $this->accommodationComposer->prepareRequestData($request);
		Accommodation::findOrNew($id)->update($requestData);
		return redirect()->route("dashboard.accommodations.index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Accommodation::find($id)->delete();
		return redirect()->back();
	}

	public function removeEmptyAccommodations()
	{
		$emptyAccommodations = Accommodation::where("article", "")->get();

		foreach ($emptyAccommodations as $accommodation) {
			$this->deleteAssociatedImages($accommodation->id);
			$accommodation->delete();
		}

	}


	public function deleteAssociatedImages($accommodationId)
	{
		$images = AccommodationImage::where("accommodation_id", $accommodationId)->get();
		foreach($images as $image){
			if(\File::exists(public_path($image->path)))
				\File::delete(public_path($image->path));
			$image->delete();
		}
	}

	public function getByCategories($categoryId)
	{
		$selected = Category::findOrFail($categoryId);

		$accommodations = Accommodation::where('category_id',$selected->id)->paginate(20);

		$categories = [0=>'Не выбрано'] + Category::where('parent_id', '<>', 0)->lists('title','id');

		return view("admin.accommodations.index", compact('accommodations','categories', 'selected'));
	}

}
