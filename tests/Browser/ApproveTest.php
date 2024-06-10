<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class ApproveTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group approve
     */
    public function testExample(): void
    {
        $campaignId = 1;
        $this->browse(function (Browser $browser) {
            $filePath = storage_path('app/public/profile.jpeg');

            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->pause(3000)
                    ->clickLink('Pencairan Dana')
                    ->assertPathIs('/admin/pencairan')
                    ->click('#cairkan-dana')
                    ->attach('#pendukung', $filePath)
                    ->pause(3000)
                    ->press('submit')

                    ->clickLink('Dashboard')
                    ->assertSee('EDU FUND DASHBOARD') //sekaligus periksa apakah donasi tercairkan berhasil di tambah pada dashboard
                    ->pause(5000)
                    ->press('#navbar-search')
                    ->clickLink('Keluar')
                    ->assertPathIs('/')
                    ;

            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->assertSee('Pencairan Dana')
                    ->clickLink('Pencairan Dana')
                    ->assertPathIs('/pencairan')
                    ->assertSee('Cairkan Dana')
                    ->pause(3000);


        });
    }
}
