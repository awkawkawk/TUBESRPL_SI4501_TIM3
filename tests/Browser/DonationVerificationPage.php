<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DonationVerificationPage extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_verify_donation()
    {
        $this->browse(function (Browser $browser) {
            // Login to the application
            $browser->visit('/login')->type('email', 'admin@gmail.com')->type('password', '12345678')->press('#Masuk')->assertPathIs('/admin/dashboard');

            // Navigate to the donation verification page
            $browser->visit('/verifikasi-donasi')->assertSee('Verifikasi Donasi');

            // Find the first donation's confirm button and click it
            $browser->with('.donation-card:first-child', function ($card) {
                $card->press('Konfirmasi');
            });

            // Confirm the modal
            $browser->whenAvailable('.confirm-modal', function ($modal) {
                $modal->press('Ya, saya yakin');
            });

            // Verify the confirmation was successful
            $browser->assertSee('Donasi telah dikonfirmasi');
        });
    }

    public function test_decline_donation()
    {
        $this->browse(function (Browser $browser) {
            // Login to the application
            $browser->visit('/login')->type('email', 'admin@gmail.com')->type('password', '12345678')->press('#Masuk')->assertPathIs('/admin/dashboard');

            // Navigate to the donation verification page
            $browser->visit('/verifikasi-donasi')->assertSee('Verifikasi Donasi');

            // Find the first donation's decline button and click it
            $browser->with('.donation-card:first-child', function ($card) {
                $card->press('Hapus');
            });

            // Confirm the modal
            $browser->whenAvailable('.decline-modal', function ($modal) {
                $modal->press('Ya, tolak');
            });

            // Verify the decline was successful
            $browser->assertSee('Donasi telah ditolak');
        });
    }
}
