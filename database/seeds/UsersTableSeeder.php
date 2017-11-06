<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'john Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password'),
        ];

        \DB::table('users')->insert($admin);

        factory(App\User::class, 5)->create();

        // factory(App\User::class)->create()->each(function ($user) {
            // $user->posts()->save(factory(App\Post::class)->make());
        // });
    }
}
