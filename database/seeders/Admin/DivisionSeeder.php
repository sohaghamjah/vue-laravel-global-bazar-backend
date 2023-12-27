<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Division;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::insert([
            [
                "id" => 1,
                "name" => "Dhaka",
                "bn_name" => "ঢাকা",
                "charge" => 60,
            ],
            [
                "id" => 2,
                "name" => "Chittagong",
                "bn_name" => "চট্টগ্রাম",
                "charge" => 120
            ],
            [
                "id" => 3,
                "name" => "Rajshahi",
                "bn_name" => "রাজশাহী",
                "charge" => 120
            ],
            [
                "id" => 4,
                "name" => "Khulna",
                "bn_name" => "খুলনা",
                "charge" => 120
            ],
            [
                "id" => 5,
                "name" => "Barisal",
                "bn_name" => "বরিশাল",
                "charge" => 120
            ],
            [
                "id" => 6,
                "name" => "Rangpur",
                "bn_name" => "রংপুর",
                "charge" => 120
            ],
            [
                "id" => 7,
                "name" => "Sylhet",
                "bn_name" => "সিলেট",
                "charge" => 120
            ],

            [
                "id" => 8,
                "name" => "Mymensingh",
                "bn_name" => "ময়মনসিংহ",
                "charge" => 120
            ]
        ]);
    }
}
