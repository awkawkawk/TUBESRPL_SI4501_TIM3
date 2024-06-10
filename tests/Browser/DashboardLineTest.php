<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class DashboardLineTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group dashboard_line
     */
    public function testExample(): void
    {
        $campaignId = 1;
        $this->browse(function (Browser $browser) {
            $filePath = storage_path('app/public/profile.jpeg');

            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->pause(3000);

            $browser->script('document.querySelector("table").scrollIntoView();');

            $browser->pause(2000)
                    ->press('#navbar-search')
                    ->clickLink('Keluar')
                    ->assertPathIs('/')
                    ;
            $campaignId = 1;
            $browser->loginAs(User::find(2))
                    ->visit('/')
                    ->screenshot('test1')
                    ->assertSee('Donasi Sekarang')
                    ->clickLink('Donasi Sekarang')
                    ->assertPathIs('/donation')
                    ->assertSee('Donasi Uang')
                    ->clickLink('Donasi Uang')
                    ->assertPathIs('/donation/money/' . $campaignId)
                    ->screenshot('test2')
                    ->type('id_campaign', '1')
                    ->type('nominal', '2000000')
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
                    ->press('#navbar-search')
                    ->clickLink('Keluar')
                    ->pause(1000)
                    ->assertPathIs('/')
                    ;


            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('EDU FUND DASHBOARD')
                    ->pause(2000)
                    ->script('document.querySelector("table").scrollIntoView();')
                    ;

                $browser->pause(8000)
                ;


        });
    }
}
