<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TovarTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testTovarSee()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
                    ->visit('/kotli/gazovie-kotli')
                    ->whenAvailable('.item-inner', function ($inner) {
                        $inner->mouseover('.item');
                        $inner->press('.item');
                    })
                    ->whenAvailable('.single-item-info', function ($inner) {
                        $inner->assertSee('Код:');
                    });
        });
    }

    public function testTovarNext()
    {
        $this->browse(function ($browser) {
            $browser->press('.linksBlock > .right')
                    ->whenAvailable('.single-item-info', function ($inner) {
                        $inner->assertSee('Код:');
                    })
                    ->press('.linksBlock > .left')
                    ->whenAvailable('.single-item-info', function ($inner) {
                        $inner->assertSee('Код:');
                    });
        });
    }

    public function testTovarCompare()
    {
        $this->browse(function ($browser) {
            $browser->press("Сравнить")
                    ->mouseover('#com_count')
                    ->pause(2000)
                    ->assertSeeIn('#com_count', '1');
        });
    }

    public function testTovarByOneClickFalse()
    {
        $this->browse(function ($browser) {
            $browser->press("#one-click")
                    ->whenAvailable('.fancybox-inner', function ($modal) {
                        $modal->type('phone', '')
                              ->press('.btn')
                              ->waitForText('Поле ТЕЛЕФОН обязательно к заполнению.');
                    })->press('.fancybox-close')
                      ->pause(1000);
        });
    }

    public function testTovarByOneClickTrue()
    {
        $this->browse(function ($browser) {
            $browser->press("#one-click")
                ->whenAvailable('.fancybox-inner', function ($modal) {
                    $modal->type('phone', '4444444444')
                        ->press('.btn')
                        ->pause(2000)
                        ->waitFor('.res');
                })->press('.fancybox-close')
                ->pause(1000);
        });
    }

    public function testTovarZakladki()
    {
        $this->browse(function ($browser) {
            $browser->clickLink("Характеристики")
                    ->waitFor('#options')
                    ->pause(500)
                    ->clickLink("Описание")
                    ->waitFor('#description')
                    ->pause(500)
                    ->clickLink("Фото")
                    ->waitFor('#foto')
                    ->pause(500)
                    ->clickLink("Отзывы")
                    ->waitFor('#ones')
                    ->pause(500);
        });
    }

    public function testTovarComentFalse()
    {
        $this->browse(function ($browser) {
            $browser->press(".review-button")
                ->whenAvailable('.fancybox-inner', function ($modal) {
                    $modal->type('body', '')
                        ->press('.btn')
                        ->pause(2000)
                        ->assertSee('Поле body обязательно к заполнению.');
                })->press('.fancybox-close')
                ->pause(1000);
        });
    }

    public function testTovarComentTrue()
    {
        $this->browse(function ($browser) {
            $browser->press(".review-button")
                    ->whenAvailable('.fancybox-inner', function ($modal) {
                        $modal->type('body', 'Коментарий для товара')
                            ->press('.btn')
                            ->pause(2000)
                            ->assertSee('ВАШ ОТЗЫВ БУДЕТ ОПУБЛИКОВАН ПОСЛЕ МОДЕРАЦИИ');
                    })->press('.fancybox-close')
                    ->pause(1000);
        });
    }

/*    public function testDownloadloFile(){
        $this->browse(function ($browser) {
            $browser->press('.instruction')
                ->assertPathIs($this->attribute);
        });
    }*/
}