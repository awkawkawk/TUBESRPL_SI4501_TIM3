<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VerifikasiCampaignTest extends DuskTestCase
{
    /**
     * A Dusk test for verifying campaign functionality.
     * @group verification
     */
    public function testVerifyCampaign(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'coba2@example.com') // Assumed test user email
                    ->type('password', '22222222') // Assumed test user password
                    ->press('MASUK')
                    ->clickLink('Verifikasi Campaign')
                    ->press('Konfirmasi')
                    ->press('Ya, saya yakin')
                    ->screenshot('submit');


        });
    }
}
