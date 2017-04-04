<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class FilterTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testfilterCena()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
                    ->visit('/kotli/gazovie-kotli')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    })
                    ->press('.orderBy')
                    ->press('.select-dropdown > li > span')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    })
                    ->press('.orderBy')
                    ->press('.select-dropdown > li:nth-child(2) > span')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    })
                    ->press('.orderBy')
                    ->press('.select-dropdown > li:nth-child(3) > span')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    });
        });
    }

    public function testfilterProizv()
    {
        $this->browse(function ($browser) {
            $browser->press('.filter-select > li > label')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    })
                    ->press('.filter-select > li > label')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    })
                    ->press('.filter-select > li:nth-child(5) > label')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    })
                    ->press('.filter-select > li:nth-child(5) > label')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    });
        });
    }

    public function testfilterCenaSlider()
    {
        $this->browse(function ($browser) {
            $browser->dragLeft('#form > span > .to', 10)
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    })
                    ->dragRight('#form > span > .from', 10)
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    })
                    ->clickLink('Сбросить все фильтры')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item')
                            ->assertSee('Код:');
                    });
        });
    }
}