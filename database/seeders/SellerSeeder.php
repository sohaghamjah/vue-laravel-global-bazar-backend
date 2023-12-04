<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create([
            'email' => 'seller@gmail.com',
            'phone' => '01991455439',
            'name' => 'Mr. Seller',
            'password' => 12345678,
        ]);
    }
}
