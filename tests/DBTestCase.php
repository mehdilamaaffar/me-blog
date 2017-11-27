<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DisableExceptionHandler;

abstract class DBTestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;
    use DisableExceptionHandler;

    public function signIn($user = null)
    {
        $user = $user ? : factory('App\User')->make();

        $this->actingAs($user);

        return $this;
    }
}
