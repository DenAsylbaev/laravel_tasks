<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function addNewsTestFalse()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('', 'den')
                    ->press('Save')
                    ->assertSee('Поле заголовок обязательно для заполнения.');

        });
    }

    public function addNewsTestTrue()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('123', 'den', 'news')
                    ->press('Save')
                    ->assertSee('Запись успешно сохранена.');

        });
    }
}
