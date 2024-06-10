<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class DashboardCampaignTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group dashboard_campaign
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $filePath = storage_path('app/public/profile.jpeg');

            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('EDU FUND DASHBOARD')
                    ->pause(3000)
                    ->press('#navbar-search')
                    ->clickLink('Keluar')
                    ->assertPathIs('/')

            ;

            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->clickLink('Tambah Campaign')
                    ->assertPathIs('/campaigns/create')
                    ->type('nama_campaign', 'Test Campaign 2') // Mengisi nama campaign
                    ->assertSee('Foto Campaign')
                    ->attach('input[name="photo"]', __DIR__.'/profile.jpeg')
                    ->type('description', 'test campaign')
                    ->select('select[name="jenis_donasi"]', 'uang') // Memilih jenis donasi "uang dan barang"
                    ->waitFor('input[name="target_uang"]', 10000000) // Menunggu elemen target uang muncul
                    ->type('target_uang', '1000000') // Mengisi target uang
                    // ->type('input[name="jenis_barang[]"]', 'Kursi') // Mengisi nama barang
                    // ->type('input[name="jumlah_barang[]"]', '100')
                    ->pause(1000)
                    ->press('Submit')
                    ->press('#navbar-search')
                    ->clickLink('Keluar')
                    ->pause(1000)
                    ->assertPathIs('/')
                    ;

            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('EDU FUND DASHBOARD')
                    ->assertSee('Total Campaign')
                    ->assertSee('9 Campaign')
                    ->pause(3000)

            ;

        });
    }
}
