<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockProducts = Stock::paginate();
        return view('admin.stock.index', compact('stockProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestProducts = $this->prepareProductsForSync($request->get('products'));
        $stock = Stock::create($request->all());
        $stock->products()->sync($requestProducts ?: []);
        
        if((int)$request->get('button')) {
            return redirect()->route('dashboard.stock.index')->withMessage('');
        }

        return redirect()->route('dashboard.stock.edit', $stock->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('admin.stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $requestProducts = $this->prepareProductsForSync($request->get('products'));
    
        $stock = Stock::find($id);
        $stock->update($request->all());
        $stock->products()->update(['is_main' => false]);
        $stock->products()->sync($requestProducts ?: []);

        if((int)$request->get('button')) {
            return redirect()->route('dashboard.stock.index')->withMessage('');
        }

        return redirect()->route('dashboard.stock.edit', $stock->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::destroy($id);
        return redirect(route('dashboard.stock.index'));
    }


    public function prepareProductsForSync($requestProducts)
    {
        if(!count($requestProducts)) return [];

        $products = Product::whereIn('clone_of', array_keys($requestProducts))->lists('clone_of', 'id')->all();
        foreach ($products as $product_id => $masterProductId) {
            if(isset($requestProducts[$masterProductId])){
                $master = $requestProducts[$masterProductId];
                $requestProducts[$product_id] = ['is_main' => $master['is_main'], 'stock_price' => $master['stock_price']];
            }
        }

        return $requestProducts;
    }

}
