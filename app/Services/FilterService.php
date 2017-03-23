<?php

namespace App\Services;

use App\Models\Characteristic;
use App\Models\CharacteristicValue;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Middleware\StartSession;

/**
 * Class FilterService
 * @package App\Services
 */
class FilterService
{
    /**
     * @param Request $request
     * @return array
     *
     * Filter products by ajax-request from filter form
     */
    public function getFilteredProducts(Request $request)
    {
        //Сохраняем фильтры в сессию
        if ($request->get('filters') !== null) {
            $request->session()->put('filters.'.$request->get('categoryId'), $request->get('filters'));
            $request->session()->save();
            $filters = $request->get('filters');
        } else {
            if($request->get('click') == true){
                $request->session()->put('filters.'.$request->get('categoryId'), null);
                $request->session()->save();
                $filters = $request->get('filters');
            }else{
                if($request->session()->get('filters.'.$request->get('categoryId')) !== null){
                    $filters = $request->session()->get('filters.'.$request->get('categoryId'));
                }else{
                    $filters = $request->get('filters');
                }
            }

        }

        //Сохраняем сортировку в сессию
        if($request->get('click') == true){
            $request->session()->put('orderBy.'.$request->get('categoryId'), $request->get('orderBy'));
            $request->session()->save();
        }else{
            $request->merge(array('orderBy' => Session::get('orderBy.'.$request->get('categoryId'))));
        }

        //Сохраняем пагинацию в сессию
        if($request->get('click') == true){
            $request->session()->put('page.'.$request->get('categoryId'), $request->get('page'));
            $request->session()->save();
        }else{
            $request->merge(array('page' => Session::get('page.'.$request->get('categoryId'))));
        }

        //Сохраняем фильтр цены в сессию
        if($request->get('click') == true){
            $request->session()->put('price.'.$request->get('categoryId'), $request->get('price'));
            $request->session()->save();
        }else{
            $request->merge(array('price' => Session::get('price.'.$request->get('categoryId'))));
        }

        if($request->get('cliar') == true){
            $request->session()->forget('filters');
            $filters = [];
            $request->session()->forget('orderBy');
            $request->merge(array('orderBy' => 'price:asc'));
            $request->session()->forget('page');
            $request->merge(array('page' => 1));
            $request->session()->forget('price');
            $request->merge(array('price' => ''));
        }

        $category = Category::where('id', $request->get('categoryId'))->with('children')->with('filters')->first();

        $categories = [$category->id] + $category->children->pluck('id')->all();

        $products = Product::whereIn('category_id', $categories);

        if (count($filters)) {
            foreach ($filters as $filter) {
                $products = $products->whereHas('filters', function ($q) use ($filter) {
                    $q->whereIn('filter_value_id', $filter);
                });
            }
        }

        if ($request->get('price')) {
            $products = $products->whereBetween('price', explode(';', $request->get('price')));
            $products = $products->ordered($request)->visible()->withRelations()->paginate();
        } else {
            $products = $products->ordered($request)->visible()->withRelations()->paginate();
        }


        //dd($request->session()->get('filters'));

        // Separate rendering of products and pagination views
        return [
            'products' => view('frontend.partials.products.filtered_products', compact('products'))->render(),
            'pagination' => view('frontend.partials.products.pagination_template', compact('products'))->render()
        ];
    }

    /**
     * @param $category
     * @param $request
     *
     * Sync filters with category
     */
    public function syncFilters($category, $request)
    {
        $filters = $request->get('filters') ? explode(',', trim($request->get('filters'), ',')) : [];

        // Just clear category relations with filters (fields)
        // because we need to sync them with extra action
        // - assign order and is_filter cols in pivot
        $category->fields()->sync([]);

        if (empty($filters)) return;

        foreach ($filters as $filter) {
            // filter here is array like - ['1:0']
            // first param - filter_id
            // second - is it filter for this category [1 or 0]
            $filterId = explode(':', trim($filter, ','))[0];
            $isFilter = explode(':', trim($filter, ','))[1];

            $sortable = $this->prepareOrder($request->get('sortable'));
            $category->fields()->attach($filterId);

            $filter = $category->fields()->find($filterId);
            $filter->pivot->is_filter = $isFilter;
            $filter->pivot->order = $sortable[$filterId];

            $filter->pivot->save();
        }
    }


    /**
     * @param $sortable | String
     * @return array
     *
     * Parse sortable input value
     * return array where keys are filterID
     * and value - filter order
     */
    public function prepareOrder($sortable)
    {
        $sortable = explode(',', $sortable);
        $arr = [];
        foreach ($sortable as $item) {
            $filterId = explode(':', $item)[0];
            $order = explode(':', $item)[1];
            $arr[$filterId] = $order;
        }
        return $arr;
    }


}