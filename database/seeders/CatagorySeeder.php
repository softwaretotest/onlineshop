<?php

namespace Database\Seeders;

use App\Models\Catagory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatagorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catagory::create(["name" => "Shirt"]);
        Catagory::create(["name" => "Boxer Short"]);
        Catagory::create(["name" => "Toy"]);
        Catagory::create(["name" => "Laptop"]);
        Catagory::create(["name" => "Smart Phone"]);
        Catagory::create(["name" => "Food"]);
    }
}
