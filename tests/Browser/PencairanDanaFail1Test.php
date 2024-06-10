<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class PencairanFail1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group pencairan_dana_fail1
     */
    public function testExample(): void
    {
        $pencairanId = 5;

        $this->browse(function (Browser $browser) use ($pencairanId)  {
            $browser->loginAs(User::find(1))
                    ->visit('/')
                    ->assertSee('Pencairan Dana')
                    ->screenshot('testpencairan_1')
                    ->clickLink('Pencairan Dana')
                    ->assertPathIs('/pencairan')
                    ->click('#cairkan-dana')
                    ->assertPathIs("/pencairan/{$pencairanId}/request")
                    ->screenshot('testpencairan_2');

                    $browser->assertSee('Form Pencairan Dana')
                    ->select('#tahap', 'Tahap 3')
                    ->select('metode_pembayaran', '2')
                    ->type('nama_pemilik', 'Ryu Sun Jae')
                    ->type('nomor_rekening', '1234567888')
                    ->type('pesan', 'test automated1')
                    // ->check('syarat_dan_ketentuan')
                    ->screenshot('testpencairan_3')
                    ->press('Ajukan Pencairan Dana')
                    ->assertPathIs('/pencairan')
                    ->screenshot('testpencairan_4')

                    ;





            ;

        });
    }
}
