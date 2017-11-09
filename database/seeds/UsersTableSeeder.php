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
            'is_admin' => 1,
        ];

        \DB::table('users')->insert($admin);

        factory(App\User::class, 5)->create();
    }
}
