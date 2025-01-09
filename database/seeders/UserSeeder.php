<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=> "admin",
            "email" => "admin@gmail.com",
            "role" => "admin",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "sonia",
            "email" => "sonia@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "yanto",
            "email" => "yanto@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "yayuk",
            "email" => "yayuk@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "sugeng",
            "email" => "sugeng@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "prili",
            "email" => "prili@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "widi",
            "email" => "widi@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "agus",
            "email" => "agus@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "zaki",
            "email" => "zaki@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "erlang",
            "email" => "erlang@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "linda",
            "email" => "linda@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
        User::create([
            "name"=> "khaila",
            "email" => "khaila@gmail.com",
            "role" => "user",
            "password" => bcrypt("password"),
        ]);
    }
}
