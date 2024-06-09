<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;

class MoneyDonationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group money_donation
     */
    public function testExample(): void
    {

        $campaignId = 1;

        $this->browse(function (Browser $browser) use ($campaignId) {
            $browser->loginAs(User::find(2))
                    ->visit('/')
                    ->screenshot('test1')
                    ->assertSee('Campaign Populer')
                    ->assertSee('Donasi Sekarang')
                    ->clickLink('Donasi Sekarang')
                    ->assertPathIs('/donation')
                    ->assertSee('Donasi Uang')
                    ->clickLink('Donasi Uang')
                    ->assertPathIs('/donation/money/' . $campaignId)
                    ->screenshot('test2')
                    ->type('id_campaign', '1')
                    ->type('nominal', '10')
                    ->screenshot('test3')
                    ->select('metode_pembayaran', '1')
                    ->screenshot('test4')
                    ->type('nama_pemilik', 'Ryu Sun Jae')
                    ->type('nomor_rekening', '1234567888')
                    ->type('pesan', 'test automated')
                    ->check('syarat_dan_ketentuan')
                    ->assertSee('Lanjutkan Pembayaran')
                    ->press('Lanjutkan Pembayaran')
                    ->screenshot('test5')
                    ->assertPathIs('/donation/money/summary')
                    ->assertSee('Sudah Bayar')
                    ->press('Sudah Bayar')
                    ->assertPathIs('/donation')
                    ->screenshot('test3')
                ;

        });
    }
}

// ->script(["document.querySelector('input[name=\"id_campaign\"]').value = '$campaignId';"])
                    // ->pause(2000)
                    // ->keys('#nominal', '10')
                    // ->assertInputValue('#nominal' , '10')
