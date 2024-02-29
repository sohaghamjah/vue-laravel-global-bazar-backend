<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Seller;
use Database\Seeders\Admin\CouponSeeder;
use Database\Seeders\Admin\DistrictSeeder;
use Database\Seeders\Admin\DivisionSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            SellerSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            CouponSeeder::class,
        ]);

        \App\Models\Admin\Slider::factory(4)->create();
        \App\Models\Admin\Category::factory(30)->create();
        \App\Models\Admin\SubCategory::factory(100)->create();
        \App\Models\Admin\Brand::factory(20)->create();
        \App\Models\Seller::factory(50)->create();
        \App\Models\Admin\Product::factory(100)->create();

    }
}
