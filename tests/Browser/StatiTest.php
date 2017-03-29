<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StatiTest extends DuskTestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    public function testStatis()
    {
        $this->browse(function ($browser) {
            $browser->maximize()
                    ->visit('/stati')
                    ->assertSee('Статьи');
        });
    }

    public function testStatya(){
        $this->browse(function ($browser) {
            $attribute = $browser->attribute('.media-inner > a', 'href');
            $browser->press('.media-inner > a > img')
                    ->assertPathIs($attribute);
        });
    }
}