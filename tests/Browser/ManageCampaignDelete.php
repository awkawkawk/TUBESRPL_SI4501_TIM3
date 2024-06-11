<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManageCampaignTest extends DuskTestCase
{
    /**
     * A Dusk test for creating a new campaign.
     *
     * @return void
     */
    public function testManageCampaign(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login') 
                    ->type('email', 's1@g.c')
                    ->type('password', '12345678')
                    ->press('MASUK')
                    ->visit('/campaigns')
                    ->assertSee('Delete')
                    ->press('Hapus') // Scroll to the bottom of the page // Wait to ensure the scroll completes
                    ->screenshot('editdelete');
        });
    }
}