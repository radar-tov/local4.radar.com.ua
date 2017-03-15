<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Characteristic;
use App\Services\FilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\Filter;

/**
 * Class CategoriesController
 * @package App\Http\Controllers\Admin
 */
class CategoriesController extends AdminController
{
	/**
	 * @var Category
	 */
	protected $category;
	/**
	 * @var \App\Models\Filter;
	 */
	protected $filter;

	/**
	 * @param Category $category
	 * @param Filter $filter
	 */
	public function __construct(Category $category, Filter $filter)
	{
		$this->category = $category;
		$this->filter = $filter;

		parent::__construct();
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$categories = $this->category
								->where('parent_id',0)
									->with('children')->orderBy('order')->get();

		return view('admin.categories.index',compact('categories'));
	}

	/**
	 * @return mixed
	 */
	public function create()
	{
		return view('admin.categories.create')
			->withCategory(new $this->category)
			->withFilters($this->filter->all());
	}

	/**
	 * @param CreateRequest $request
	 * @param FilterService $filterService
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(CreateRequest $request, FilterService $filterService)
	{
//		$idsArray = explode(',', trim($request->get('characteristicsIds'), ','));

		$category = $this->category->create($request->all());

		$filterService->syncFilters($category, $request);
//		 $category->strain()->attach($request->get('filters') ?: []);

//		Characteristic::whereIn('id', $idsArray)->update(['category_id' => $category->id]);

		if((int)$request->get('button')) {
			return redirect()->route('categories.index')->withMessage('');
		}

		return redirect()->route('categories.edit',$category->id);
	}

	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function edit(Request $request, $id)
	{
		$category = $this->category->with('fields')->findOrFail($id);

		if($request->ajax()){
			return $category->load('fields', 'xapacts');
			//dd($category->load('fields')->toArray());
		}

		$filters = $this->filter->all();

		$activeFilters = $category->filters()->get(['id'])->pluck('id')->toArray();

		$activeStrain = $category->strain()->get(['id'])->pluck('id')->toArray();

		return view('admin.categories.edit', compact('category','filters','activeFilters','activeStrain'));
	}

	/**
	 * @param UpdateRequest $request
	 * @param FilterService $filterService
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UpdateRequest $request, FilterService $filterService, $id)
	{
		$category = $this->category->findOrFail($id);

		$category->update($request->all());

		$arr = $request->get('filters') ?: [];
        
		$i = 0;

		
		foreach($arr as &$filter){
			$filter['order'] = $i;
			isset($filter['show']) ?: $filter['show'] = 0;
			isset($filter['is_filter']) ?: $filter['is_filter'] = 0;
			$i++;

		};

		// dd($filter);
		
		$category->filters()->sync($arr);
		//$filterService->syncFilters($category, $request);

        $xap = $request->get('xapacts') ?: [];
        $o = 0;
        foreach($xap as &$xapact){
            $xapact['order'] = $o;
            isset($xapact['show']) ?: $xapact['show'] = 0;
            $o++;
        };

        $category->saveXapacts()->sync($xap);

		if((int)$request->get('button')) {
			return redirect()->route('categories.index')->withMessage('');
		}

		return redirect()->route('categories.edit',$id);

	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$this->category->where('parent_id',$id)->update(['parent_id' => 0,'deep' => 0]);

		$this->category->findOrFail($id)->delete();

		return redirect()->route('categories.index');
	}

	/**
	 * @return array
	 */
	public function order()
	{
		
		foreach(\Request::get('serialized') as $catKey => $category) {
		    if(isset($category['children'])) {
				foreach($category['children'] as $childKey=>$child) {
					$this->category->find($child['id'])
						->update(['order'=>$childKey, 'parent_id' => $category['id'], 'deep' => 1]);
				}
		    }
			$this->category->find($category['id'])->update(['order' => $catKey, 'parent_id' => 0, 'deep' => 0]);
        }
		return ['success' => true];
	}

	public function sortFilters(Request $request)
	{
		return $request->all();
	}

}
