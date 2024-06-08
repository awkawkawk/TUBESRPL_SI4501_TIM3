<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RiwayatCampaignTest extends DuskTestCase
{


    /**
     * A Dusk test example.
     * @group riwayat
     */
    public function testExample(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'smpn1bahagia@gmail.com')
                    ->type('password', '12345678')
                    ->press('LOG IN')
                    ->assertPathIs('/')
                    ->assertSee('Campaign Populer')
                    ->assertSee('Riwayat Campaign')
                    ->clickLink('Riwayat Campaign')
                    ->assertPathIs('/campaign/riwayat')
                    ->assertSee('Riwayat Donasi Sekolahmu');
                });

        // $user = User::firstOrCreate(
        //     ['email' => 'smpn1bahagia@gmail.com'],
        //     [
        //         'name' => 'Test User',
        //         'password' => bcrypt('12345678')
        //     ]
        // );

        // $this->browse(function (Browser $browser) use ($user) {
        //     $browser->loginAs($user)
        //             ->visit('/')
        //             ->screenshot('testlogin')
        //             ->assertSee('Campaign Populer')
        //             ->assertSee('Riwayat Campaign')
        //             ->clickLink('Riwayat Campaign')
        //             ->assertPathIs('/campaign/riwayat')
        //             ->assertSee('Riwayat Donasi Sekolahmu');
        // });
    }
}
