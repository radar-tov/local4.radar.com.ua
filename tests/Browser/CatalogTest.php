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

    public function testCatalogSee()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
                    ->visit('/')
                    ->clickLink('Котлы')
                    ->assertPathIs('/kotli')
                    ->assertSee('© Все права защищены.')
                    ->mouseover('.havechild')
                    ->clickLink('Газовые котлы')
                    ->assertPathIs('/kotli/gazovie-kotli')
                    ->assertSee('© Все права защищены.');
        });
    }

    public function testCataligAddToCompare()
    {
        $this->browse(function ($browser) {
            $browser->whenAvailable('.item-inner', function ($modal) {
                $modal->mouseover('.item')
                    ->whenAvailable('.item .compare-box-hover', function ($item) {
                        $item->press('Сравнить');
                    });
            })->mouseover('.vs')
                ->pause(2000)
                ->assertSeeIn('.vs', '1');
        });
    }

    public function testCataligAddToCart()
    {
        $this->browse(function ($browser) {
            $browser->mouseover('.item')
                ->press('.addtocart-box-hover')
                ->mouseover('.qty')
                ->pause(2000)
                ->assertSeeIn('.qty', '1')
                ->whenAvailable('.fancybox-inner', function ($fansy) {
                    $fansy->assertSee('ТОВАР В КОРЗИНУ ДОБАВЛЕН');
                })->press('.fancybox-close')
                ->pause(2000);
        });
    }

    public function testPagination()
    {
        $this->browse(function ($browser) {
            $browser->mouseover('.pagination')
                ->clickLink('2')
                ->whenAvailable('.item-inner', function ($inner) {
                    $inner->mouseover('.item')
                        ->assertSee('Код:');
                });
        });
    }

    public function testPaginationNabr()
    {
        $this->browse(function ($browser) {
            $browser->mouseover('.pagination')
                ->clickLink('4')
                ->whenAvailable('.item-inner', function ($inner) {
                    $inner->mouseover('.item')
                        ->assertSee('Код:');
                });
        });
    }

    public function testPaginationNext()
    {
        $this->browse(function ($browser) {
            $browser->mouseover('.pagination')
                ->clickLink('»')
                ->whenAvailable('.item-inner', function ($inner) {
                    $inner->mouseover('.item')
                        ->assertSee('Код:');
                });
        });
    }

    public function testPaginationBack()
    {
        $this->browse(function ($browser) {
            $browser->mouseover('.pagination')
                ->clickLink('«')
                ->whenAvailable('.item-inner', function ($inner) {
                    $inner->mouseover('.item')
                        ->assertSee('Код:');
                });
        });
    }
}
