<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;

class EditProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editprofil
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard/edufund')
                    ->click('button[data-dropdown-toggle="dropdown-user"]')
                    ->clickLink('Profil')
                    ->assertPathIs('/profile')

                    //editprofil
                    ->assertSee('Edit Profile')
                    ->attach('edit-photo', public_path('/img/profile.jpeg'))
                    ->type('name', 'nama')
                    ->type('phone', 'phone')
                    ->type('email', 'admin@gmail.com')
                    ->press('SIMPAN')

                    //updatepassword
                    ->assertSee('Update Password')
                    ->type('current_password', 'password')
                    ->type('password_confirmation', 'password_confirmation')
                    ->press('SIMPAN')
                    
                    //delete
                    ->assertSee('Hapus akun Anda')
                    ->press('HAPUS AKUN ANDA')
                    ->assertPathIs('/profile')
                    ->screenshot('test-profile')
                    ;
                   
        });
    }
}