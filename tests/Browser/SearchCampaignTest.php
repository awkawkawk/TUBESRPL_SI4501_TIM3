<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class SearchCampaignTest extends DuskTestCase
{
    /**
     * A Dusk test for search campaign functionality.
     * @group search
     */
    public function testSearchCampaign(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Cari')
                    ->waitFor('input[name="keyword"]', 5)
                    ->click('input[name="keyword"]') // Memastikan fokus dan elemen tidak stale
                    ->type('keyword', 'test2')
                    ->screenshot('before-enter')
                    ->waitFor('input[name="keyword"]', 5) // Memastikan elemen fresh
                    ->keys('input[name="keyword"]', ['{ENTER}'])
                    ->screenshot('after-enter');



        });
    }
}
