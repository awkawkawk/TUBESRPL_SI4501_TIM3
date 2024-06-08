<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group dashboard
     */
    public function testExample(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/')
                    ->assertSee('Campaign Populer')
                    ->clickLink('Dashboard')
                    ->assertPathIs('/dashboard/edufund')
                    ->assertSee('EDU FUND DASHBOARD')
                    ->pause(3000)
                    ->screenshot('dashboard')
                    ;
        });
    }
}
