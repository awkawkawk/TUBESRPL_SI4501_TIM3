<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class PencairanDana2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group pencairan_tahap2
     */
    public function testExample(): void
    {
        $pencairanId = 5;


        $this->browse(function (Browser $browser) use ($pencairanId)  {
            $filePath = storage_path('app/public/profile.jpeg');
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
                    ->select('#tahap', 'Tahap 2')
                    ->screenshot('testpencairan_3')
                    ->select('metode_pembayaran', '2')
                    ->type('nama_pemilik', 'Ryu Sun Jae')
                    ->type('nomor_rekening', '1234567888')
                    ->type('pesan', 'test automated1')
                    ->attach('#pendukung', $filePath)
                    ->check('syarat_dan_ketentuan')
                    ->screenshot('testpencairan_3')
                    ->press('Ajukan Pencairan Dana')
                    ->pause(3000)
                    ->screenshot('testpencairan_4')
                    ->assertPathIs('/pencairan')
                    ->screenshot('testpencairan_5')

                    //Lanjut approve ke admin



                    ;





            ;

        });
    }
}
