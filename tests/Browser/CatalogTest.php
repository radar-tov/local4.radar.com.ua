<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\Models\User;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CatalogTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->browse(function ($browser){
            $browser->maximize();
        });
    }

/*    public function testCatalogSee()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->clickLink('Котлы')
                ->assertPathIs('/kotli')
                ->assertSee('© Все права защищены.')
                ->mouseover('.havechild')
                ->clickLink('Газовые котлы')
                ->assertPathIs('/kotli/gazovie-kotli')
                ->assertSee('© Все права защищены.');
        });
    }

    public function testCataligAddToCompare(){
        $this->browse(function ($browser) {
            $browser->visit('/kotli/gazovie-kotli')
                    ->whenAvailable('.item-inner', function ($modal){
                        $modal->mouseover('.item')
                                ->press('.compare-box-hover')
                                ->pause(2000);

                    })->assertSeeIn('.vs', '1');
        });
    }*/

    public function testCataligAddToCart(){
        $this->browse(function ($browser) {
            $browser->visit('/kotli/gazovie-kotli')
                ->whenAvailable('.item-inner', function ($modal){
                    $modal->mouseover('.item')
                        ->press('.addtocart-box-hover')
                        ->pause(2000);
                })->assertSeeIn('.qty', '1')
                ->whenAvailable('.fancybox-inner', function ($fansy){
                    $fansy->assertSee('ТОВАР В КОРЗИНУ ДОБАВЛЕН');
                });
        });
    }
}
