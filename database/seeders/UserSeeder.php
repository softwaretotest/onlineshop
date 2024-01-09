<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "User 1",
            "email" => "user@gmail.com",
            "usertype" => "0",
            "phone" => "0781114433",
            "address" => "wallstreet 99 NYC",
            "password" => bcrypt("12345678")
        ]);
    }
}
