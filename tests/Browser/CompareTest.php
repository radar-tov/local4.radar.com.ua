<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CompareTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testCompareAdd()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
                ->visit('/kotli/gazovie-kotli')
                ->whenAvailable('.item-inner', function ($inner) {
                    $inner->mouseover('.item')
                          ->press('Сравнить');
                })
                ->mouseover('.vs')
                ->pause(1000)
                ->assertSeeIn('.vs', '1')
                ->whenAvailable('.item-inner:nth-child(2)', function ($inner) {
                    $inner->mouseover('.item')
                        ->press('Сравнить');
                })
                ->mouseover('.vs')
                ->pause(1000)
                ->assertSeeIn('.vs', '2');
        });
    }

    public function testCompareSee()
    {
        $this->browse(function ($browser) {
            $browser->visit('/compare')
                    ->whenAvailable('.compare_product', function ($item) {
                        $item->assertSee('Удалить из сравнения');
                    })->pause(1000);
        });
    }

    public function testCompareDelete()
    {
        $this->browse(function ($browser) {
            $browser->press('Удалить из сравнения')
                    ->whenAvailable('.compare_product', function ($item) {
                        $item->assertSee('Удалить из сравнения');
                    })
                    ->pause(1000)
                    ->press('Удалить из сравнения')
                    ->whenAvailable('.container', function ($item) {
                        $item->pause(1000)
                             ->assertSeeIn('h4', 'Нет товаров для сравнения');
                    });
        });
    }
}