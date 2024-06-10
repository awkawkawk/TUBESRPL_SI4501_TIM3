<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;

class ManageDonaturTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group managedonatur
     */
    public function testExample(): void
    {
        $donationId = 16;

        $this->browse(function (Browser $browser) use ($donationId) {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard/edufund')
                    // ->screenshot('test-donaturs')
                    ->assertSee('Manage Donatur')
                    ->clickLink('Manage Donatur')
                    ->assertPathIs('/admin/donatur')
                    ->assertSee('Manage Donatur')
                    ->click('#edit')

                    ->assertPathIs('/admin/edit/donatur/'.$donationId)
                    ->type('name', 'test1')
                    ->type('email', 'test1@gmail.com')
                    ->type('phone', '081223344465')
                    ->select('peran', 'donatur')
                    ->press('SIMPAN')
                    
                    // DeleteDonatur
                    ->visit('/admin/donatur')
                    ->dump()
                    ->press('#removeButton')
                    ->screenshot('test-donatur')
                    ;
        });
    }
}
