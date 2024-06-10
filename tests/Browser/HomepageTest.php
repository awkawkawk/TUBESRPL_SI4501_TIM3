<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomepageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLoginAndAccessDashboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'donatur@gmail.com')
                    ->type('password', '12345678')
                    ->press('#Masuk')
                    ->assertPathIs('/');
        });
    }
}
