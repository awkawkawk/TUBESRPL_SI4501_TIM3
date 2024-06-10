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
        $donationId = 3;

        $this->browse(function (Browser $browser) use ($donationId) {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard/edufund')
                    // ->screenshot('test-donaturs')
                    ->assertSee('Manage Donatur')
                    ->clickLink('Manage Donatur')
                    ->assertPathIs('/admin/donatur')
                    ->assertSee('Manage Donatur')
                    ->click('#edit')

                    ->assertPathIs('/admin/edit/donation/item/' . $donationId)
                    ->type('name', 'edufund')
                    ->type('email', 'edufund@gmail.com')
                    ->type('phone', '0812233444')
                    ->select('peran', 'donatur')
                    ->press('SIMPAN')
                    ->assertPathIs('/admin/donatur')
                    
                    // DeleteDonatur
                    ->visit('http://127.0.0.1:8000/admin/donatur')
                    ->dump()
                    ->press('#removeButton')
                    ->screenshot('test-donatur')
                    ;
        });
    }
}
