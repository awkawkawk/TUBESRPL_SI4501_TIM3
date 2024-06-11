<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RiwayatDonasiTest extends DuskTestCase
{
    /**
     * A Dusk test for creating a new campaign.
     *
     * @return void
     */
    public function testRiwayatDonasi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login') 
                    ->type('email', 's1@g.c')
                    ->type('password', '12345678')
                    ->press('MASUK')
                    ->assertPathIs('/')
                    ->assertSee('Riwayat Donasi')
                    ->clickLink('Riwayat Donasi')
                    ->screenshot('Riwayat_donasi');
        });
    }
}