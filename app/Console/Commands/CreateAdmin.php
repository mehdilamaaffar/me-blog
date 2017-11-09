<?php

namespace App\Console\Commands;

use App\User;
use RuntimeException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create blog admin.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is the password?(min: 6 character)');
        $is_admin = true; // true = Admin, false = simple user

        $data = [
            'name'      => $name,
            'email'     => $email,
            'password'  => $password,
            'is_admin'  => $is_admin,
        ];

        $validator = Validator::make($data, [
            'name'      => 'required|min:4|max:100|unique:users',
            'email'     => 'required|email|max:200|unique:users',
            'password'  => 'required|min:6|max:100',
            'is_admin'  => 'required|boolean',
        ]);

        if (! $validator->passes()) {
            throw new RuntimeException($validator->errors()->first());
        }

        User::create([
            'name'      => $name,
            'email'     => $email,
            'password'  => bcrypt($password),
            'is_admin'  => $is_admin,
        ]);

        $this->info('The Admin has been created successfully!');
    }
}
