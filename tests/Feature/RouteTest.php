<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_root()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_all_routes_authorized()
    {

        $user = \App\User::find(1);
        $this->be($user);

        $response = $this->get('/');
        $response->assertStatus(302);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);

        $response = $this->get('/books');
        $response->assertStatus(200);

        $response = $this->get('/book/1');
        $response->assertStatus(200);

        $response = $this->get('/authors');
        $response->assertStatus(200);

        $response = $this->get('/author/1');
        $response->assertStatus(200);

        $response = $this->get('/borrowers');
        $response->assertStatus(200);

        $response = $this->get('/borrower/1');
        $response->assertStatus(200);

        $response = $this->get('/borrowings');
        $response->assertStatus(200);

        $response = $this->get('/borrowing/1');
        $response->assertStatus(200);


    }
}
