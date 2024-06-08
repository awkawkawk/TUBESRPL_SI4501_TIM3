<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;

class MoneyDonationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group money_donation
     */
    public function testExample(): void
    {
        $user = User::factory()->create([
            'email' => 'smpn2bahagia@gmail.com',
            'password' => Hash::make('12345678'), // Hash the password
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/') // buat login
                    ->screenshot('test1')
                    ->assertSee('Masuk')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'smpn2bahagia@gmail.com')
                    ->type('password', '12345678')
                    ->press('LOG IN')
                    ->assertPathIs('/')
                    ->assertSee('Campaign Populer')
                    // ->assertSee('Donasi Sekarang')
                    // ->clickLink('Donasi Sekarang')
                    // ->assertPathIs('/donation') //ganti path ke index donasi
                    // ->assertSee('Donasi Uang')
                    // ->clickLink('Donasi Uang')
                    // ->assertPathIs('/donation/money/{id}') // ganti path ke create donasi uang
                    // ->type('id_campaign', '2')
                    // ->type('nominal', '20000')
                    // ->select('metode_pembayaran', 'Bank Mandiri') //buat drop down
                    // ->type('nama_pemilik', 'Ryu Sun Jae')
                    // ->type('nomor_rekening', '1234567888')
                    // ->type('pesan', 'test automated')
                    // ->check('syarat_dan_ketentuan')
                    // ->assertSee('Lanjutkan Pembayaran')
                    // ->press('Lanjutkan Pembayaran')
                    // ->assertPathIs('/donation/money/summry') //  ganti ke path summry
                    // ->assertSee('Sudah Bayar')
                    // ->press('Sudah Bayar')
                    // ->assertPathIs('/donation') // ganti ke path  indeks
                    // ->assertSee('Campaign Populer')
                ;

        });
    }
}
