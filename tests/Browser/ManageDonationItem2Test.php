<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class ManageDonationItem2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group manage_donation_item_2
     */
    public function testExample(): void
    {
        $donationId = 3;

        $this->browse(function (Browser $browser) use ($donationId)  {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('Manage Donasi')
                    ->clickLink('Manage Donasi')
                    ->assertPathIs('/admin/edit/donation/money')
                    ->assertSee('Daftar Donasi Masuk')
                    ->clickLink('Donasi Barang')
                    ->screenshot('testmanage2_item1')
                    ->click('#button-edit')
                    ->assertPathIs('/admin/edit/donation/item/' . $donationId)
                    ;

                    $browser->assertSee('Barang Donasi Lama')
                    ->select('#nama_barang_0', 'Buku')
                    ->type('#jumlah_barang_0', 'teks')
                    ->select('#nama_barang_1', 'Penghapus')
                    ->type('#jumlah_barang_1', 'teks2')
                    ->select('#nama_barang_3', 'Buku')
                    ->type('#jumlah_barang_3', '0')
                    ->screenshot('testmanage_item2')
                    ->press('#removeButton_101');

                    $browser->press('+')
                    ->select('#nama_barang_101', 'Pensil')
                    ->type('#jumlah_barang_101', '30')
                    ->screenshot('testmanage_item3')
                    ->press('#removeButton_101')
                    ->screenshot('testmanage_item4')

                    ->type('jasa_kirim', 'JNT')
                    ->type('nomor_resi', 'JJ10234567')
                    ->type('pesan', 'test automated')
                    ->screenshot('testmanage_item5')
                    ->pause(2000)

                    ->assertSee('Lanjutkan Perubahan')
                    ->press('Lanjutkan Perubahan')
                    ->assertPathIs('/admin/edit/donation/item')
                    ->screenshot('testmanage_item6')

                    // ->click('#button-delete')
                    // ->screenshot('testmanage_item7')
                    ;
        });
    }
}
