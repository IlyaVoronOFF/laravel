<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_category_route()
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }

    public function test_category_list()
    {
        $id = mt_rand(1, 5);
        $response = $this->get('/category/' . $id);

        $response->assertStatus(200);
    }
}