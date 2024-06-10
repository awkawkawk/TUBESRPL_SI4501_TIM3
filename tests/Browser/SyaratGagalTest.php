<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SyaratGagalTest extends DuskTestCase
{
    /**
     * A Dusk test for terms and conditions confirmation.
     * @group termserror
     */
    public function testTermsAndConditions(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'coba1@example.com')
                    ->type('password', '11111111')
                    ->press('MASUK')
                    ->clickLink('Donasi Sekarang')
                    ->visit("/donation/money/2")
                    ->screenshot('before isi data')
                    ->type('id_campaign', '1')
                    ->type('nominal', '10')
                    ->select('metode_pembayaran', '1')
                    ->type('nama_pemilik', 'Falkri')
                    ->type('nomor_rekening', '123')
                    ->type('pesan', 'gagal testing')
                    ->press('Lanjutkan Pembayaran')
                    ->screenshot('gagal lanjut');

        });
    }
}
