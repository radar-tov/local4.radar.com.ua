<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class IndexTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testindexSee()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
                    ->visit('/')
                    ->assertSee('© Все права защищены.');
        });
    }

    public function testAddToCompare()
    {
        $this->browse(function ($browser) {
            $browser->mouseover('.slick-active')
                    ->whenAvailable('.slick-active .compare-box-hover', function ($item) {
                        $item->press('Сравнить');
                    })->mouseover('.vs')
                    ->pause(2000)
                    ->assertSeeIn('.vs', '1');
        });
    }

    public function testAddToCart()
    {
        $this->browse(function ($browser) {
            $browser->mouseover('.slick-active')
                    ->whenAvailable('.slick-active .addtocart-box-hover', function ($item) {
                        $item->press('Добавить в корзину');
                    })->mouseover('.qty')
                    ->pause(2000)
                    ->assertSeeIn('.qty', '1')
                    ->whenAvailable('.fancybox-inner', function ($fansy) {
                        $fansy->assertSee('ТОВАР В КОРЗИНУ ДОБАВЛЕН');
                    })->press('.fancybox-close')
                    ->pause(1000);
        });
    }

    public function testSendCallBackFalseName()
    {
        $this->browse(function ($browser){
            $browser->press('.various')
                    ->whenAvailable('.fancybox-inner', function ($modal) {
                        $modal->type('name', '')
                            ->type('phone', '')
                            ->press('.btn')
                            ->waitForText('Поле ИМЯ обязательно к заполнению.');
                    })->press('.fancybox-close')
                      ->pause(1000);
        });
    }

   public function testSendCallBackFalsePhone()
    {
        $this->browse(function ($browser){
            $browser->press('.various')
                    ->whenAvailable('.fancybox-inner', function ($modal) {
                        $modal->type('name', 'BOT')
                            ->type('phone', '')
                            ->press('.btn')
                            ->waitForText('Поле ТЕЛЕФОН обязательно к заполнению.');
                    })->press('.fancybox-close')
                      ->pause(1000);
        });
    }

    public function testSendCallBackTrue()
    {
        $this->browse(function ($browser){
            $browser->press('.various')
                    ->whenAvailable('.fancybox-inner', function ($modal) {
                        $modal->type('name', 'BOT')
                            ->type('phone', '4444444444')
                            ->press('.btn')
                            ->pause(2000)
                            ->waitFor('.res');
                    })->press('.fancybox-close')
                      ->pause(1000);
        });
    }

    public function testSendSkidkaFalseName()
    {
        $this->browse(function ($browser){
            $browser->press('.various1')
                    ->whenAvailable('.fancybox-inner', function ($modal) {
                        $modal->type('name', '')
                            ->type('email', '')
                            ->type('phone', '')
                            ->type('comment', '')
                            ->press('.btn')
                            ->pause(2000)
                            ->waitForText('Поле ИМЯ обязательно к заполнению.');
                    })->press('.fancybox-close')
                      ->pause(1000);
        });
    }

    public function testSendSkidkaFalsePhone()
    {
        $this->browse(function ($browser){
            $browser->press('.various1')
                    ->whenAvailable('.fancybox-inner', function ($modal) {
                        $modal->type('name', 'BOT')
                            ->type('email', '')
                            ->type('phone', '')
                            ->type('comment', '')
                            ->press('.btn')
                            ->pause(2000)
                            ->waitForText('Поле ТЕЛЕФОН обязательно к заполнению.');
                    })->press('.fancybox-close')
                      ->pause(1000);
        });
    }

    public function testSendSkidkaTrue()
    {
        $this->browse(function ($browser){
            $browser->press('.various1')
                    ->whenAvailable('.fancybox-inner', function ($modal) {
                        $modal->type('name', 'BOT')
                            ->type('email', 'bot@gmail.com')
                            ->type('phone', '4444444444')
                            ->type('comment', 'Коментарий')
                            ->press('.btn')
                            ->pause(2000)
                            ->waitFor('.res');
                    })->press('.fancybox-close');
        });
    }
}
