<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_post_has_a_category()
    {
        $post = create('App\Post', [
            'category_id' => factory('App\Category')->create()->id,
            'user_id' => factory('App\User')->create()->id,
        ]);

        $this->assertInstanceOf('App\Category', $post->category);
    }

    /** @test */
    function a_post_has_a_user()
    {
        $post = create('App\Post', [
            'category_id' => factory('App\Category')->create()->id,
            'user_id' => factory('App\User')->create()->id,
        ]);

        $this->assertInstanceOf('App\User', $post->author);
    }
}
