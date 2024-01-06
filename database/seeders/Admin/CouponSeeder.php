<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::insert([
            [
                "code" => "CODERS",
                "value" => 200,
                "type" => "fixed",
                "status" => 1,
            ],
            [
                "code" => "EID",
                "value" => 10,
                "type" => "percent",
                "status" => 1,
            ]
        ]);
    }
}
