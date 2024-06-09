<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;

class ItemDonationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group item_donation
     */
    public function testExample(): void
    {
        $campaignId = 1;

        $this->browse(function (Browser $browser) use ($campaignId) {
            $browser->loginAs(User::find(2))
                    ->visit('/')
                    ->assertSee('Campaign Populer')
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
                    ->press('+')
                    ->screenshot('test_item3');

                    $browser->waitForText('Barang Donasi 3')
                    ->select('#nama_barang_3', 'Meja')
                    ->type('#jumlah_barang_3', '12')
                    ->screenshot('test_item4')
                    ->pause(2000)
                    ->press('#removeButton_3')
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

                    ;

                });
    }
}
