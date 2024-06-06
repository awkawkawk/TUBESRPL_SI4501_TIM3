<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

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
                    ->assertSee('Masuk')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'smpn1bahagia@gmail.com')
                    ->type('password', '12345678')
                    ->press('LOG IN')
                    ->assertPathIs('/')
                    ->assertSee('Campaign Populer')
                    ->assertSee('Riwayat Donasi')
                    ->clickLink('Riwayat Donasi')
                    ->assertPathIs('/campaign/riwayat')
                    ->assertSee('Riwayat Donasi Sekolahmu');
        });
    }
}
