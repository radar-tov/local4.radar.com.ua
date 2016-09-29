<?php


use App\Http\Controllers\Admin\StockController;
use App\Models\Stock;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\View\View;

class CrossSalesTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function it_should_return_view_with_stock_objects()
    {
        Stock::create(['title' => 'test stock']);

        $this->visit('dashboard/stock')->assertResponseOk();

        $this->assertViewHas('stockProducts');
        $stock = $this->response->original->getData()['stockProducts'];

        $this->assertTrue(is_a($stock->first(), Stock::class),
            $errMsg = "Stock products should be an instance of Stock");
    }

    /**
     * @test
     */
    public function it_should_return_view()
    {
        $out = (new StockController())->index();
        $this->assertTrue($out instanceof View, $errMsg = "expected that instance of View to be returned but it's not");
    }









}