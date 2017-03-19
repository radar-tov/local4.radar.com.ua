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
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        \Session::start();

        /*$credentials = array(
            'username' => 'wronguser',
            'password' => 'wrongpass',
            '_token' => csrf_token()
        );*/

        /*$user = factory(User::class)->create([
            'phone' => '12345678901',
        ]);
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/')
                ->assertSee('СПЕЦПРЕДЛОЖЕНИЯ');
        });*/

        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->assertSee('СПЕЦПРЕДЛОЖЕНИЯ');
        });
    }
}
