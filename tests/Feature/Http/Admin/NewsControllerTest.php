<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_News_List_Success()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
        $response->assertSeeText('Список новостей');
        $response->assertDontSeeText('Список категорий');
    }
}
