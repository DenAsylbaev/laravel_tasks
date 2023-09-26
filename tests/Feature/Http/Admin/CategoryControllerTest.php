<?php

namespace Tests\Feature\Http\Admin;

use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Categories_List_Success()
    {
        $response = $this->get(route('admin.categories.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Список категорий');
        $response->assertDontSeeText('Список новостей');
    }

    public function test_Categories_Store_Success()
    {
        $testCategory = [
            'id' => '001',
            'title' => 'test_title',
            'description' => 'test_description',
        ];
        $response = $this->post(route('admin.categories.store'), $testCategory);
        $response->assertStatus(302);
        

    }
}
