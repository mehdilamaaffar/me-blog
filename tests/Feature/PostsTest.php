<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function it_return_all_posts()
    {
        $response = $this->visit('/');

        $response->assertResponseOk();
    }
}
