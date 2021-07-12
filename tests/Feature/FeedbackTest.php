<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_feedback_route()
    {
        $response = $this->get('/feedback/create');

        $response->assertStatus(200);
    }

    public function test_feedback_request()
    {
        session_start();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/feedback/store', [
            'first_name' => 'Sally',
            'email' => 'test@test.ru',
            'phone' => '79998887766',
            'description' => 'Hello, my friend.',
        ]);

        $response->dumpHeaders($_REQUEST);
        $response->assertStatus(201);

        $response->assertSessionHasAll([
            'first_name' => 'Sally',
            'email' => 'test@test.ru',
            'phone' => '79998887766',
            'description' => 'Hello, my friend.',
        ]);

        session_abort();
    }
}