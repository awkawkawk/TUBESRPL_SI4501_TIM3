<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LihatDonatur extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group lihat_donatur
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->screenshot('testlogin1')
                    ->assertSee('Riwayat Campaign')
                    ->clickLink('Riwayat Campaign')
                    ->assertPathIs('/campaign/riwayat')
                    ->assertSee('Riwayat Donasi Sekolahmu')
                    ->assertSee('Lihat Donatur')
                    ->clickLink('Lihat Donatur')
                    ->screenshot('testlihatdonatur');
        });
    }
}
