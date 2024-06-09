<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\School;

class ManageSekolahTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        
        // Seed the database with some test data
        School::factory()->create([
            'nama_sekolah' => 'Sekolah Test 1',
            'alamat_sekolah' => 'Jl. Test 1',
            'no_telepon_sekolah' => '081234567890',
            'email_sekolah' => 'test1@sekolah.com',
            'status' => 'Active',
        ]);

        School::factory()->create([
            'nama_sekolah' => 'Sekolah Test 2',
            'alamat_sekolah' => 'Jl. Test 2',
            'no_telepon_sekolah' => '081234567891',
            'email_sekolah' => 'test2@sekolah.com',
            'status' => 'Inactive',
        ]);
    }

    /**
     * Test viewing the list of schools.
     */
    public function testViewListOfSchools(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/schools')
                    ->assertSee('Daftar Sekolah')
                    ->assertSee('Sekolah Test 1')
                    ->assertSee('Sekolah Test 2');
        });
    }

    /**
     * Test editing a school.
     */
    public function testEditSchool(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/schools')
                    ->waitFor('.edit-button', 10) // Tingkatkan waktu tunggu hingga 10 detik
                    ->screenshot('edit-button-not-found') // Ambil screenshot jika gagal
                    ->click('.edit-button') // Menggunakan selektor CSS yang sesuai
                    ->type('name', 'Sekolah Baru')
                    ->press('Save')
                    ->assertSee('Sekolah Baru');
        });
    }
    
    public function testDeleteSchool(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/schools')
                    ->waitFor('.delete-button', 10) // Tingkatkan waktu tunggu hingga 10 detik
                    ->screenshot('delete-button-not-found') // Ambil screenshot jika gagal
                    ->click('.delete-button') // Menggunakan selektor CSS yang sesuai
                    ->assertDontSee('Sekolah Test 1');
        });
    }
}    