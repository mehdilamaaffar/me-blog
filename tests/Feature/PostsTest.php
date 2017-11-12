<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    /** @test */
    public function see_home_page()
    {
        $this->visit('/')
             ->see('home');
    }

    /** @test */
    public function see_search_page()
    {
        $this->visit('/search')
             ->see('home');
    }
}
