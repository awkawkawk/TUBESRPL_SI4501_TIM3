<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Factories\UserFactory;
use App\Models\User;

class BeritaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/manage/berita/news')

                    //create
                    ->assertSee('Manage Berita')
                    ->click('#tambah')
                    ->assertPathIs('/admin/manage/berita/create')
                    ->type('title', 'judul')
                    ->scrollIntoView('#content') 
                    ->type('#content', 'Ini adalah konten berita')
                    // ->type('content', 'konten')
                    // ->type('release_date', 'tanggal')
                    ;
        });
    }
}
