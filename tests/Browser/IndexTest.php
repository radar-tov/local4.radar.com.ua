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

/*    public function testindexSee()
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
                ->mouseover('.slick-active')
                ->press('.slick-active .compare-box-hover')
                ->pause(2000)
                ->assertSeeIn('.vs', '1');
        });
    }

    public function testAddToCart()
    {
        $this->browse(function ($browser){
            $browser->visit('/')
                ->mouseover('.slick-active')
                ->press('.slick-active .addtocart-box-hover')
                ->pause(2000)
                ->assertSeeIn('.qty', '1');
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
    }*/

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
                        ->waitFor('.res')
                        ->assertSeeIn('.res', 'Ваша заявка принята.');
                });
        });
    }
}
