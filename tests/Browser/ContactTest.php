<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ContactTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    /**
     *
     */
/*    public function testContactMap()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
                ->visit('/contacts')
                ->waitFor('#map', 30)
                ->switchFrame('map')
                ->whenAvailable('.ymaps-2-1-47-balloon', function ($inner) {
                    $inner->assertSee('Україна, Одеса');
                });
        });
    }*/

    public function testContactFormNameFalse(){
        $this->browse(function ($browser) {
            $browser->maximize()
                    ->visit('/contacts')
                    ->type('name', 'BOT')
                    ->type('email', 'qwe@qwe.ru')
                    ->type('comment', 'Коментарий')
                    ->press('Отправить')
                    ->whenAvailable('.fancybox-inner', function ($fansy) {
                        $fansy->waitFor('.res');
                    });
        });
    }
}