<?php

namespace Tests\Feature;

use Tests\DBTestCase;

class PostsTest extends DBTestCase
{
    /** @test */
    function user_can_see_all_posts()
    {
        $post = create('App\Post', [
            'category_id' => create('App\Category')->id,
            'user_id' => create('App\User')->id,
        ]);

        $this->get('/home')
            ->assertStatus(200)
            ->assertSee($post->title);
    }

    /** @test */
    function user_can_see_single_post()
    {
        $post = create('App\Post', [
            'category_id' => create('App\Category')->id,
            'user_id'=> create('App\User')->id,
        ]);

        $this->get('/post/' . $post->slug)
             ->assertStatus(200)
             ->assertSee($post->title);
    }

    /** @test */
    function user_can_see_search_page()
    {
        $this->get('/search')
             ->assertStatus(200);
    }

    /** @test */
    function a_guest_can_post_a_article()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $post = create('App\Post', [
            'category_id' => create('App\Category')->id,
            'user_id' => create('App\User')->id,
        ]);;

        $this->post('/admin/posts', $post->toArray());
    }

    /** @test */
    function a_guest_can_see_create_article_page()
    {
        $this->withExceptionHandling()
            ->get('/admin/posts/create')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_submit_a_post()
    {
        $this->signIn($user = create('App\User'));

        $post = raw('App\Post', [
            'category_id' => create('App\Category'),
            'user_id' => $user->id,
        ]);

        $this->post('/admin/posts', $post);

        $this->get('/post/' . $post['slug'])
            ->assertSee($post['title']);
    }

    /** @test */
    function a_post_requires_a_title()
    {
        $this->publishPost(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    function a_post_requires_a_is_draft()
    {
        $this->publishPost(['is_draft' => null])
            ->assertSessionHasErrors('is_draft');
    }

    protected function publishPost($overrides= [])
    {
        $this->withExceptionHandling()
            ->signIn();

        $post = states('App\Post', 'test', $overrides);

        return $this->post('/admin/posts', $post->toArray());
    }
}
