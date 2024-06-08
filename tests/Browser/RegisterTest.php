<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group regis
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Daftar')
                    ->clickLink('Daftar')
                    ->assertPathIs('/register')
                    ->type('name', 'nama')
                    ->type('phone', 'phone')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password_confirmation')
                    ->assertSee('Daftar')
                    ->clickLink('Daftar');
                    // ->assertPathIs('/home');
                   
        });
    }
}