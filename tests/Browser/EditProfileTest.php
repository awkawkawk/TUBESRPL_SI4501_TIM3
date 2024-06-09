<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;

class EditProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editprofil
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->assertSee('Beranda')
                    ->clickLink('Masuk')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', 'password')
                    ->press('LOG IN')
                    ->assertPathIs('/donatur')

                    //EditProfile
                    // ->clickLink('Manage Donatur')
                    ->visit('http://127.0.0.1:8000/')
                    ->press('clickbutton');
                    // ->assertSee('Manage Donatur')
                    // ->assertPathIs('/profile')
                    // ->attach('edit-photo', public_path('/img/profile.jpeg'))
                    // ->type('name', 'nama')
                    // ->type('phone', 'phone')
                    // ->type('email', 'admin@gmail.com')
                    // ->press('SIMPAN')
                    // ->type('current_password', 'password')
                    // ->type('password_confirmation', 'password_confirmation')
                    // ->press('SIMPAN')
                    // ->press('HAPUS AKUN ANDA')
                    // ->assertPathIs('/profile');
                   
        });
    }
}