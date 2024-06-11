<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class DetailSchoolTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testDesainSchool(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login') 
                    ->type('email', 'billy@gmail.com')
                    ->type('password', '12345678')
                    ->press('MASUK')
                    ->clickLink('Bantuan Sekolah Dasar')
                    ->clickLink('SMA 9')
                    ->screenshot('AfterManage');

        });
    }
}
