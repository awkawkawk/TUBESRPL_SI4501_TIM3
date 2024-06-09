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
        $donationId = 14;

        $this->browse(function (Browser $browser) use ($donationId) {
            $browser->loginAs(User::find(14))
                    ->visit('/admin/dashboard/edufund')
                    // ->screenshot('test-donaturs')
                    ->assertSee('Manage Donatur')
                    ->clickLink('Manage Donatur')
                    ->assertPathIs('/admin/donatur')
                    ->assertSee('Manage Donatur')
                    ->click('#edit')

                    ->assertPathIs('/admin/edit/donatur/'.$donationId)
                    ->type('name', 'donaturs')
                    ->type('email', 'donaturs@gmail.com')
                    ->type('phone', '0812233445566')
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
