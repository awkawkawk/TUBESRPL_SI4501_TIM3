<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class DashboardPaymentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group dashboard_payment
     */
    public function testExample(): void
    {
        $campaignId = 1;
        $this->browse(function (Browser $browser) {
            $filePath = storage_path('app/public/profile.jpeg');

            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->clickLink('Pencairan Dana')
                    ->assertPathIs('/admin/pencairan')
                    ->assertSee('Nama Campaign')
                    ->assertSee('Perbaikan Kelas')
                    ->assertSee('Test Campaign 2')
                    ->clickLink('Dashboard')
                    ->assertPathIs('/admin/dashboard/edufund')
                    ->pause(3000);

            $browser->script('document.querySelector("table").scrollIntoView();');

            $browser->assertSee('Nama Campaign')
                    ->assertSee('Perbaikan Kelas')
                    ->assertSee('Test Campaign 2')
                    ->assertSee('Metode Pembayaran')
                    ->assertSee('Nomor Rekening')
                    ->assertSee('Bank Mandiri')
                    ->assertSee('009998877765')
                    ->pause(8000)
                    ;

        });
    }
}
