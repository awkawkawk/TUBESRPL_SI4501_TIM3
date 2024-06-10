<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class DashboardCampaignItemTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group dashboard_campaign_item
     */
    public function testExample(): void
    {
            $campaignId = 1;

        $this->browse(function (Browser $browser) use ($campaignId) {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('EDU FUND DASHBOARD')
                    ->pause(3000)
                    ->press('#navbar-search')
                    ->clickLink('Keluar')
                    ->assertPathIs('/');


                    $browser->loginAs(User::find(2))
                    ->visit('/')
                    ->assertSee('Donasi Sekarang')
                    ->clickLink('Donasi Sekarang')
                    ->assertPathIs('/donation')
                    ->assertSee('Donasi Barang')
                    ->clickLink('Donasi Barang')
                    ->assertPathIs('/donation/item/' . $campaignId)
                    ->screenshot('test_item1')
                    ->assertSee('Pilih Barang');

                    $browser->assertSee('Barang Donasi 1')
                    ->select('#nama_barang_1', 'Meja')
                    ->type('#jumlah_barang_1', '12')
                    ->press('+')
                    ->screenshot('test_item2');

                    $browser->waitForText('Barang Donasi 2')
                    ->select('#nama_barang_2', 'Kursi')
                    ->type('#jumlah_barang_2', '12')
                    ->press('#removeButton_2')
                    ->pause(2000)
                    ->screenshot('test_item5')

                    ->type('jasa_kirim', 'JNE')
                    ->type('nomor_resi', 'JJ10234567')
                    ->type('pesan', 'test automated')
                    ->check('syarat_dan_ketentuan')
                    ->screenshot('test_item6')
                    ->pause(2000)

                    ->assertSee('Lanjutkan Donasi Anda')
                    ->press('Lanjutkan Donasi Anda')
                    ->assertPathIs('/donation/item/' . $campaignId)
                    ->screenshot('test_item7')
                    ->pause(2000)
                    ->press('Kirim Donasi')

                    ->assertPathIs('/donation')
                    ->screenshot('test_item8')


                    ->press('#navbar-search')
                    ->clickLink('Keluar')
                    ->pause(1000)
                    ->assertPathIs('/')
                    ;

            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('EDU FUND DASHBOARD')
                    ->assertSee('Barang')
                    ->assertSee('14 Donasi')
                    ->assertSee('Jumlah Donasi Barang')
                    ->assertSee('13')
                    ->pause(5000)

            ;

        });
    }
}
