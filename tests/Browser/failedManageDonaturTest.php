<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;

class failedManageDonaturTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group failedmanagedonatur
     */
    public function testExample(): void
    {
        $donationId = 16;

        $this->browse(function (Browser $browser) use ($donationId) {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard/edufund')
                    ->dump()
                    // ->screenshot('test-donaturs')
                    ->assertSee('Manage Donatur')
                    ->clickLink('Manage Donatur')
                    ->assertPathIs('/admin/donatur')
                    ->assertSee('Manage Donatur')
                    ->click('#edit')

                    ->assertPathIs('/admin/edit/donatur/'.$donationId)
                    ->type('name', '')
                    ->type('email', 'invalid-email')
                    ->type('phone', 'invalid-phone')
                    ->select('peran', 'donatur')
                    ->press('SIMPAN')
                    ->assertPathIs('/admin/edit/donatur/'.$donationId)
                    ->pause(2000)
                    ->screenshot('failed-donatur')
                    ;
        });
    }
}
