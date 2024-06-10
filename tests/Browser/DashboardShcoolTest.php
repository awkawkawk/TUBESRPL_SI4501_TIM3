<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
class DashboardShcoolTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group dashboard_school
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $filePath = storage_path('app/public/profile.jpeg');

            $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('EDU FUND DASHBOARD')
                    ->assertSee('Jumlah Sekolah Terdaftar')
                    ->assertSee('1')
                    ->pause(3000);

            $browser->script('document.querySelector("table").scrollIntoView();');

            $browser->assertSee('Jumlah User EduFund')
                    ->assertSee('1')
                    ->pause(2000)
                    ->press('#navbar-search')
                    ->clickLink('Keluar')
                    ->assertPathIs('/')
                    ;

            $browser->visit('/')
                    ->assertSee('Daftarkan Sekolah')
                    ->clickLink('Daftarkan Sekolah')
                    ->assertPathIs('/register-school')

                    ->type('nama_pendaftar', 'Test Sekolah 2')
                    ->type('no_hp_pendaftar', '09876543439')
                    ->type('email_pendaftar', 'test12@gmail.com')
                    ->type('identitas_pendaftar', '12345678997744')
                    ->attach('#bukti_id_pendaftar', $filePath)
                    ->attach('#logo_sekolah', $filePath)
                    ->type('nama_sekolah', 'Test Sekolah 1')
                    ->type('alamat_sekolah', 'Jalan Bahagia 1')
                    ->type('no_telepon_sekolah', '555666477888')
                    ->screenshot('testregister1')
                    ->type('email_sekolah', 'testing12@gmail.com')
                    ->type('password', '12345678')
                    ->type('password_confirmation', '12345678')
                    ->screenshot('testregister1')
                    ->press('DAFTAR')
                    ->assertPathIs('/')
                    ->pause(3000)
                    ;


                $browser->loginAs(User::find(3))
                    ->visit('/admin/dashboard')
                    ->assertSee('EDU FUND DASHBOARD')
                    ->assertSee('Jumlah Sekolah Terdaftar')
                    ->assertSee('2')
                    ->pause(3000)
                    ->script('document.querySelector("table").scrollIntoView();')
                    ;

                $browser->pause(7000)
                ->assertSee('Jumlah Sekolah Terdaftar')
                ->assertSee('2')
                ->pause(3000)
                ;
                    // ->assertPathIs('/register')
                    // ->type('name', 'Oming')
                    // ->type('email', 'ming123@gmail.com')
                    // ->type('password', '12345678')
                    // ->type('password_confirmation', '12345678')
                    // ->press('Register');

        });
    }
}
