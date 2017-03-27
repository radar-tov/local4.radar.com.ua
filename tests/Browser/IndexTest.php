<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\Models\User;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class IndexTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->browse(function ($browser){
            $browser->maximize();
        });
    }

    public function testindexSee()
    {
        $this->browse(function ($browser){
            $browser->visit('/')
                ->assertSee('© Все права защищены.');
        });
    }

    public function testAddToCompare()
    {
        $this->browse(function ($browser){
            $browser->visit('/')
                ->mouseover('.slick-active', function ($mod){
                    $mod->press('.compare-box-hover')
                        ->pause(2000)
                        ->assertSeeIn('.vs', '1');
                });

        });
    }

    public function testAddToCart()
    {
        $this->browse(function ($browser){
            $browser->visit('/')
                ->mouseover('.slick-active', function ($mod){
                    $mod->press('.slick-active .buy')
                        ->pause(2000)
                        ->assertSeeIn('.qty', '1');
                });
        });
    }

    public function testSendCallBackFalseName()
    {
        $user = factory(User::class)->create([
            'phone' => '4444444444',
        ]);

        $this->browse(function ($browser) use ($user){
            $browser->visit('/')
                ->press('.various')
                ->whenAvailable('.fancybox-inner', function ($modal){
                    $modal->type('name', '')
                        ->type('phone', '')
                        ->press('.btn')
                        ->waitForText('Поле ИМЯ обязательно к заполнению.');
                });
        });
    }

    public function testSendCallBackFalsePhone()
    {
        $user = factory(User::class)->create([
            'phone' => '4444444444',
        ]);

        $this->browse(function ($browser) use ($user){
            $browser->visit('/')
                ->press('.various')
                ->whenAvailable('.fancybox-inner', function ($modal){
                    $modal->type('name', 'BOT')
                        ->type('phone', '')
                        ->press('.btn')
                        ->waitForText('Поле ТЕЛЕФОН обязательно к заполнению.');
                });
        });
    }

    public function testSendCallBackTrue()
    {
        $user = factory(User::class)->create([
            'phone' => '4444444444',
        ]);

        $this->browse(function ($browser) use ($user){
            $browser->visit('/')
                ->press('.various')
                ->whenAvailable('.fancybox-inner', function ($modal){
                    $modal->type('name', 'BOT')
                        ->type('phone', '4444444444')
                        ->press('.btn')
                        ->pause(2000)
                        ->waitFor('.res');
                });
        });
    }

    public function testSendSkidkaFalseName()
    {
        $user = factory(User::class)->create([
            'phone' => '4444444444',
        ]);

        $this->browse(function ($browser) use ($user){
            $browser->visit('/')
                ->press('.various1')
                ->whenAvailable('.fancybox-inner', function ($modal){
                    $modal->type('name', '')
                        ->type('email', '')
                        ->type('phone', '')
                        ->type('comment', '')
                        ->press('.btn')
                        ->pause(2000)
                        ->waitForText('Поле ИМЯ обязательно к заполнению.');
                });
        });
    }

    public function testSendSkidkaFalsePhone()
    {
        $user = factory(User::class)->create([
            'phone' => '4444444444',
        ]);

        $this->browse(function ($browser) use ($user){
            $browser->visit('/')
                ->press('.various1')
                ->whenAvailable('.fancybox-inner', function ($modal){
                    $modal->type('name', 'BOT')
                        ->type('email', '')
                        ->type('phone', '')
                        ->type('comment', '')
                        ->press('.btn')
                        ->pause(2000)
                        ->waitForText('Поле ТЕЛЕФОН обязательно к заполнению.');
                });
        });
    }

    public function testSendSkidkaTrue()
    {
        $user = factory(User::class)->create([
            'phone' => '4444444444',
        ]);

        $this->browse(function ($browser) use ($user){
            $browser->visit('/')
                ->press('.various1')
                ->whenAvailable('.fancybox-inner', function ($modal){
                    $modal->type('name', 'BOT')
                        ->type('email', 'bot@gmail.com')
                        ->type('phone', '4444444444')
                        ->type('comment', 'Коментарий')
                        ->press('.btn')
                        ->pause(2000)
                        ->waitFor('.res');
                });
        });
    }
}
