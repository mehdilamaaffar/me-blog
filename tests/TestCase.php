<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DisableExceptionHandler;

    public function signIn($user = null)
    {
        $user = $user ?: factory('App\User')->make();

        $this->actingAs($user);

        return $this;
    }
}
