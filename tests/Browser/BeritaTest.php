<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
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
                    ->visit('/admin/donatur')

                    // Navigate to Berita section
                    ->assertSee('Berita')
                    ->clickLink('Berita')
                    ->assertPathIs('/admin/manage/berita/news')
                    ->assertSee('Manage Berita')

                    // Create new Berita
                    ->click('#tambah')
                    ->assertPathIs('/admin/manage/berita/create')
                    ->assertSee('Tambah Berita')
                    ->type('title', 'titles');
            
            // Set CKEditor content
            $browser->script("CKEDITOR.instances['content'].setData('Ini adalah konten berita');");

            // Attach image and fill other fields
            $browser->attach('image', public_path('/img/EduFund2.png'))
                    ->type('release_date', 'valid_date')  
                    ->type('link', 'link news')
                    ->press('Simpan')
                    // ->screenshot('testcreate')
                    ;

            // Edit Berita
            $browser->visit('/admin/manage/berita/news')
                    ->assertSee('Manage Berita')
                    ->click('#edit')
                    ->assertPathIs('/admin/manage/berita/7/edit')  
                    ->assertSee('Tambah Berita')
                    ->type('title', 'new title');
                    // ->pause(5000);

            // Set CKEditor content
            $browser->script("CKEDITOR.instances['content'].setData('Ini adalah konten berita baru');");

            // Attach image and fill other fields
            $browser->attach('image', public_path('/img/EduFund2.png'))
                    ->type('release_date', 'valid dates')  
                    ->type('link', 'linknews')
                    ->press('Tambah')
                    // ->screenshot('testedit')
                    ;
            
             // Delete Berita
            $browser->visit('/admin/manage/berita/news')
                    ->assertSee('Manage Berita')
                    ->click('#delete-button')
                    ->screenshot('test-berita')
                    ;

        });
    }
}
