<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class FailedBeritaTest extends DuskTestCase
{
    /**
     * Test creating a news item with missing title.
     * @group failed
     */
    public function testCreateNews(): void
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
                    ->type('title', '');

            // Set CKEditor content
            $browser->script("if (typeof CKEDITOR !== 'undefined') { CKEDITOR.instances['content'].setData('Ini adalah konten berita'); }");

            // Attach image and fill other fields
            $browser->attach('image', public_path('/img/EduFund2.png'))
                    ->type('release_date', 'valid_date')  
                    ->type('link', 'link news')
                    ->press('Simpan')
                    ->assertPathIs('/admin/manage/berita/create')
                    ->pause(2000)
                    ->screenshot('testcreate');
        });
    }

    /**
     * Test editing a news item with missing release date.
     * @group failed
     */
    public function testEditNews(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(3))
                    ->visit('/admin/manage/berita/news')
                    ->assertSee('Manage Berita')
                    ->click('#edit')
                    ->assertPathIs('/admin/manage/berita/8/edit')  
                    ->assertSee('Tambah Berita')
                    ->type('title', 'new title');

            // Set CKEditor content
            $browser->script("if (typeof CKEDITOR !== 'undefined') { CKEDITOR.instances['content'].setData('Ini adalah konten berita baru'); }");

            // Attach image and fill other fields
            $browser->attach('image', public_path('/img/EduFund2.png'))
                    ->type('release_date', '')  
                    ->type('link', 'linknews')
                    ->press('Tambah')
                    ->assertPathIs('/admin/manage/berita/8/edit')  
                    ->screenshot('testedit');
        });
    }
}
