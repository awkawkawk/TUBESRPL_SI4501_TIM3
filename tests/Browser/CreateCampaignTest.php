<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateCampaignTest extends DuskTestCase
{
    /**
     * A Dusk test for creating a new campaign.
     *
     * @return void
     */
    public function testCreateCampaign(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login') 
                    ->type('email', 's1@g.c')
                    ->type('password', '12345678')
                    ->press('MASUK')
                    ->assertPathIs('/')
                    ->assertSee('Tambah Campaign')
                    ->clickLink('Tambah Campaign')
                    ->assertSee('Nama Campaign')
                    ->type('nama_campaign', 'Test Campaign') // Mengisi nama campaign
                    ->assertSee('Foto Campaign')
                    ->attach('input[name="photo"]', __DIR__.'/EduFund.png')
                    ->select('select[name="jenis_donasi"]', 'uang_barang') // Memilih jenis donasi "uang dan barang"
                    ->waitFor('input[name="target_uang"]', 10) // Menunggu elemen target uang muncul
                    ->type('target_uang', '1000000') // Mengisi target uang
                    ->type('input[name="jenis_barang[]"]', 'Kursi') // Mengisi nama barang
                    ->type('input[name="jumlah_barang[]"]', '100') // Mengisi jumlah barang
                    ->press('Submit'); // Menekan tombol submit;
        });
    }
}
