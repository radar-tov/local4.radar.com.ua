<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StaticPageTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testAbout()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
                    ->visit('/about')
                    ->assertSee('Подробнее о компании');
        });
    }

    public function testDelivery()
    {
        $this->browse(function ($browser) {
            $browser->visit('/delivery')
                    ->assertSee('ДОСТАВКА И ОПЛАТА');
        });
    }

    public function testProizvoditeli()
    {
        $this->browse(function ($browser) {
            $browser->visit('/proizvoditeli')
                ->assertSee('Партнеры компании');
        });
    }

    public function testGarantiya()
    {
        $this->browse(function ($browser) {
            $browser->visit('/garantiya')
                ->assertSee('ГАРАНТИЯ');
        });
    }
}