<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class ManageDonationMoneyTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group manage_donation_money
     */
    public function testExample(): void
    {
        $donationId = 1;

        $this->browse(function (Browser $browser) use ($donationId)  {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('Manage Donasi')
                    ->clickLink('Manage Donasi')
                    ->assertPathIs('/admin/edit/donation/money')
                    ->assertSee('Daftar Donasi Masuk')
                    ->screenshot('testmanage_money1')
                    ->click('#button-edit')
                    ->assertPathIs('/admin/edit/donation/money/' . $donationId)
                    ->screenshot('testmanage_money2')
                    ->type('nominal', '5000000')
                    ->screenshot('testmanage_money3')
                    ->select('metode_pembayaran', '2')
                    ->screenshot('test4')
                    ->type('nama_pemilik', 'Ryu Sun Jaee')
                    ->type('nomor_rekening', '19998888877')
                    ->type('pesan', 'test edit ')
                    ->assertSee('Lanjutkan Perubahan')
                    ->press('Lanjutkan Perubahan')
                    ->screenshot('testmanage_money4')
                    ->assertPathIs('/admin/edit/donation/money/summary')
                    ->assertSee('Lanjutkan Perubahan')
                    ->press('Lanjutkan Perubahan')
                    ->assertPathIs('/admin/edit/donation/money')
                    ->screenshot('testmanage_money5')
                    ->click('#button-delete')
                    ->screenshot('testmanage_money6');


                    ;
        });
    }
}
