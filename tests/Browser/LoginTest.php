<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $user = User::factory()->create([
            'email' => 'test2@gmail.com',
            'password' => Hash::make('12345678'), // Hash the password
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/') // buat login
                    ->screenshot('test1')
                    ->assertSee('Masuk')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'test@gmail.com')
                    ->type('password', '12345678')
                    ->press('LOG IN')
                    ->assertPathIs('/')
                    ->assertSee('Campaign Populer')

                ;

        });
    }
}
