<?php

use Illuminate\Database\Seeder;
use Admin\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            "name" => "Luiz",
            "email" => "email@dominio.com",
            "password" => bcrypt(123),
            "role" => "client",
            "remember_token" => str_random(10)
        ]);

        factory(User::class)->create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => bcrypt(123),
            "role" => "admin",
            "remember_token" => str_random(10)
        ]);

        factory(User::class, 5)->create();
    }
}
