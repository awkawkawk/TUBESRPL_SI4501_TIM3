<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;

class ManageDonaturTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group managedonatur
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Beranda')
                    ->clickLink('Masuk')
                    ->type('email', 'admin@gmail.com')
                    ->type('password', 'password')
                    ->press('LOG IN')
                    
                    //EditDonatur
                    ->visit('http://127.0.0.1:8000/donatur')
                    ->dump()
                    ->press('.ml-4.mt-4 a button')
                    ->assertSee('Edit Donatur')
                    ->type('name', 'nama')
                    ->type('email', 'test1@gmail.com')
                    ->type('phone', '081234566')
                    ->select('peran', 'donatur')
                    ->screenshot('test_1')
                    ->press('SIMPAN')
                    ->screenshot('test_2')
                    ->assertPathIs('/donatur')
                    
                    
                    // DeleteDonatur
                    ->visit('http://127.0.0.1:8000/donatur')
                    ->dump()
                    ->press('#removeButton')
                    ->screenshot('test_3')
                    ;
        });
    }
}
