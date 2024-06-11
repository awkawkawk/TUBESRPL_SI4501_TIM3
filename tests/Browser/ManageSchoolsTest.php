<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManageSchoolsTest extends DuskTestCase
{
    /**
     * A Dusk test for creating a new campaign.
     *
     * @return void
     */
    public function testManageSchool(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login') 
                    ->type('email', 'bill@gmail.com')
                    ->type('password', '12345678')
                    ->press('MASUK')
                    ->assertSee('Manage Sekolah')
                    ->clickLink('Manage Sekolah')
                    ->visit('/schools/1/edit')
                    ->type('nama_sekolah', 'SMA 10') // Mengisi nama campaign
                    ->type('alamat_sekolah', 'jember')
                    ->type('no_telepon_sekolah', '08234235644')
                    ->attach('logo_sekolah', __DIR__.'/EduFund.png')
                    ->type('status', 'Approved')
                    ->press('Update') // Menekan tombol submit;
                    ->screenshot('AfterManage')
                    ->pause(5000)
                    ->screenshot('afterdelete');
        });
    }
}
