<?php


use App\Http\Controllers\Frontend\CartController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;

class CartTest extends TestCase
{
    
    use DatabaseTransactions;
    use WithoutMiddleware;


    public function getContent_method_should_return_collection_of_items()
    {
        
    }


    /**
     * @test
     */
    public function there_are_should_be_a_cart_key_in_session_when_add_product()
    {
        session()->put('stocks.stock_23', "test");
        $request = $this->createRequestWithProduct();

        (new CartController())->addProduct($request);
        $this->assertSessionHas('cart');
    }





    public function createRequestWithProduct()
    {
        $product = \App\Models\Product::first();
        $request = new Request();
        $request->request->add(['productId' => $product->id]);
        return $request;
    }

}