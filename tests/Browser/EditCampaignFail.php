<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditCampaignFail extends DuskTestCase
{
    /**
     * A Dusk test for creating a new campaign.
     *
     * @return void
     */
    public function testEditFail(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login') 
                    ->type('email', 's1@g.c')
                    ->type('password', '12345678')
                    ->press('MASUK')
                    ->assertPathIs('/')
                    ->assertSee('Riwayat Campaign')
                    ->clickLink('Riwayat Campaign')
                    ->assertSee('Edit Campaign')
                    ->clickLink('Edit Campaign')
                    ->assertSee('Nama Campaign')
                    ->type('nama_campaign', 'Test Campaign') // Mengisi nama campaign
                    ->assertSee('Foto Campaign')
                    ->attach('input[name="photo"]', __DIR__.'/EduFund.png')
                    ->select('select[name="jenis_donasi"]', 'uang_barang') // Memilih jenis donasi "uang dan barang"
                    ->waitFor('input[name="target_uang"]', 10) // Menunggu elemen target uang muncul
                    ->type('target_uang', ' ') // Mengisi target uang
                    ->type('input[name="jenis_barang[]"]', ' ') // Mengisi nama barang
                    ->type('input[name="jumlah_barang[]"]', ' ') // Wait until the 'Submit' text is visible
                    ->script('window.scrollTo(0, document.body.scrollHeight);'); // Scroll to the bottom of the page // Wait to ensure the scroll completes
            
            $browser->pause(2000) // Wait to ensure the scroll completes
                    ->click('button[type="submit"]')
                    ->screenshot('after-submit');
        });
    }
}