<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\District;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::insert([
            [
                "id" => 1,
                "division_id" => 1,
                "name" => "Narsingdi",
                "bn_name" => "নরসিংদী"
            ],
            [
                "id" => 2,
                "division_id" => 1,
                "name" => "Gazipur",
                "bn_name" => "গাজীপুর"
            ],
            [
                "id" => 3,
                "division_id" => 1,
                "name" => "Shariatpur",
                "bn_name" => "শরীয়তপুর"
            ],
            [
                "id" => 4,
                "division_id" => 1,
                "name" => "Narayanganj",
                "bn_name" => "নারায়ণগঞ্জ"
            ],
            [
                "id" => 5,
                "division_id" => 1,
                "name" => "Tangail",
                "bn_name" => "টাঙ্গাইল"
            ],
            [
                "id" => 6,
                "division_id" => 1,
                "name" => "Kishoreganj",
                "bn_name" => "কিশোরগঞ্জ"
            ],
            [
                "id" => 7,
                "division_id" => 1,
                "name" => "Manikganj",
                "bn_name" => "মানিকগঞ্জ"
            ],
            [
                "id" => 8,
                "division_id" => 1,
                "name" => "Dhaka",
                "bn_name" => "ঢাকা"
            ],
            [
                "id" => 9,
                "division_id" => 1,
                "name" => "Munshiganj",
                "bn_name" => "মুন্সিগঞ্জ"
            ],
            [
                "id" => 10,
                "division_id" => 1,
                "name" => "Rajbari",
                "bn_name" => "রাজবাড়ী"
            ],
            [
                "id" => 11,
                "division_id" => 1,
                "name" => "Madaripur",
                "bn_name" => "মাদারীপুর"
            ],
            [
                "id" => 12,
                "division_id" => 1,
                "name" => "Gopalganj",
                "bn_name" => "গোপালগঞ্জ"
            ],
            [
                "id" => 13,
                "division_id" => 1,
                "name" => "Faridpur",
                "bn_name" => "ফরিদপুর"
            ],
            [
                "id" => 14,
                "division_id" => 2,
                "name" => "Comilla",
                "bn_name" => "কুমিল্লা"
            ],
            [
                "id" => 15,
                "division_id" => 2,
                "name" => "Feni",
                "bn_name" => "ফেনী"
            ],
            [
                "id" => 16,
                "division_id" => 2,
                "name" => "Brahmanbaria",
                "bn_name" => "ব্রাহ্মণবাড়িয়া"
            ],
            [
                "id" => 17,
                "division_id" => 2,
                "name" => "Rangamati",
                "bn_name" => "রাঙ্গামাটি"
            ],
            [
                "id" => 18,
                "division_id" => 2,
                "name" => "Noakhali",
                "bn_name" => "নোয়াখালী"
            ],
            [
                "id" => 19,
                "division_id" => 2,
                "name" => "Chandpur",
                "bn_name" => "চাঁদপুর"
            ],
            [
                "id" => 20,
                "division_id" => 2,
                "name" => "Lakshmipur",
                "bn_name" => "লক্ষ্মীপুর"
            ],
            [
                "id" => 21,
                "division_id" => 2,
                "name" => "Chittagong",
                "bn_name" => "চট্টগ্রাম"
            ],
            [
                "id" => 22,
                "division_id" => 2,
                "name" => "Coxsbazar",
                "bn_name" => "কক্সবাজার"
            ],
            [
                "id" => 23,
                "division_id" => 2,
                "name" => "Khagrachhari",
                "bn_name" => "খাগড়াছড়ি"
            ],
            [
                "id" => 24,
                "division_id" => 2,
                "name" => "Bandarban",
                "bn_name" => "বান্দরবান"
            ],
            [
                "id" => 25,
                "division_id" => 3,
                "name" => "Sirajganj",
                "bn_name" => "সিরাজগঞ্জ"
            ],
            [
                "id" => 26,
                "division_id" => 3,
                "name" => "Pabna",
                "bn_name" => "পাবনা"
            ],
            [
                "id" => 27,
                "division_id" => 3,
                "name" => "Bogra",
                "bn_name" => "বগুড়া"
            ],
            [
                "id" => 28,
                "division_id" => 3,
                "name" => "Rajshahi",
                "bn_name" => "রাজশাহী"
            ],
            [
                "id" => 29,
                "division_id" => 3,
                "name" => "Natore",
                "bn_name" => "নাটোর"
            ],
            [
                "id" => 30,
                "division_id" => 3,
                "name" => "Joypurhat",
                "bn_name" => "জয়পুরহাট"
            ],
            [
                "id" => 31,
                "division_id" => 3,
                "name" => "Chapainawabganj",
                "bn_name" => "চাঁপাইনবাবগঞ্জ"
            ],
            [
                "id" => 32,
                "division_id" => 3,
                "name" => "Naogaon",
                "bn_name" => "নওগাঁ"
            ],
            [
                "id" => 33,
                "division_id" => 4,
                "name" => "Jessore",
                "bn_name" => "যশোর"
            ],
            [
                "id" => 34,
                "division_id" => 4,
                "name" => "Satkhira",
                "bn_name" => "সাতক্ষীরা"
            ],
            [
                "id" => 35,
                "division_id" => 4,
                "name" => "Meherpur",
                "bn_name" => "মেহেরপুর"
            ],
            [
                "id" => 36,
                "division_id" => 4,
                "name" => "Narail",
                "bn_name" => "নড়াইল"
            ],
            [
                "id" => 37,
                "division_id" => 4,
                "name" => "Chuadanga",
                "bn_name" => "চুয়াডাঙ্গা"
            ],
            [
                "id" => 38,
                "division_id" => 4,
                "name" => "Kushtia",
                "bn_name" => "কুষ্টিয়া"
            ],
            [
                "id" => 39,
                "division_id" => 4,
                "name" => "Magura",
                "bn_name" => "মাগুরা"
            ],
            [
                "id" => 40,
                "division_id" => 4,
                "name" => "Khulna",
                "bn_name" => "খুলনা"
            ],
            [
                "id" => 41,
                "division_id" => 4,
                "name" => "Bagerhat",
                "bn_name" => "বাগেরহাট"
            ],
            [
                "id" => 42,
                "division_id" => 4,
                "name" => "Jhenaidah",
                "bn_name" => "ঝিনাইদহ"
            ],
            [
                "id" => 43,
                "division_id" => 5,
                "name" => "Jhalakathi",
                "bn_name" => "ঝালকাঠি"
            ],
            [
                "id" => 44,
                "division_id" => 5,
                "name" => "Patuakhali",
                "bn_name" => "পটুয়াখালী"
            ],
            [
                "id" => 45,
                "division_id" => 5,
                "name" => "Pirojpur",
                "bn_name" => "পিরোজপুর"
            ],
            [
                "id" => 46,
                "division_id" => 5,
                "name" => "Barisal",
                "bn_name" => "বরিশাল"
            ],
            [
                "id" => 47,
                "division_id" => 5,
                "name" => "Bhola",
                "bn_name" => "ভোলা"
            ],
            [
                "id" => 48,
                "division_id" => 5,
                "name" => "Barguna",
                "bn_name" => "বরগুনা"
            ],
            [
                "id" => 49,
                "division_id" => 6,
                "name" => "Panchagarh",
                "bn_name" => "পঞ্চগড়"
            ],
            [
                "id" => 50,
                "division_id" => 6,
                "name" => "Dinajpur",
                "bn_name" => "দিনাজপুর"
            ],
            [
                "id" => 51,
                "division_id" => 6,
                "name" => "Lalmonirhat",
                "bn_name" => "লালমনিরহাট"
            ],
            [
                "id" => 52,
                "division_id" => 6,
                "name" => "Nilphamari",
                "bn_name" => "নীলফামারী"
            ],
            [
                "id" => 53,
                "division_id" => 6,
                "name" => "Gaibandha",
                "bn_name" => "গাইবান্ধা"
            ],
            [
                "id" => 54,
                "division_id" => 6,
                "name" => "Thakurgaon",
                "bn_name" => "ঠাকুরগাঁও"
            ],
            [
                "id" => 55,
                "division_id" => 6,
                "name" => "Rangpur",
                "bn_name" => "রংপুর"
            ],
            [
                "id" => 56,
                "division_id" => 6,
                "name" => "Kurigram",
                "bn_name" => "কুড়িগ্রাম"
            ],
            [
                "id" => 57,
                "division_id" => 7,
                "name" => "Sylhet",
                "bn_name" => "সিলেট"
            ],
            [
                "id" => 58,
                "division_id" => 7,
                "name" => "Moulvibazar",
                "bn_name" => "মৌলভীবাজার"
            ],
            [
                "id" => 59,
                "division_id" => 7,
                "name" => "Habiganj",
                "bn_name" => "হবিগঞ্জ"
            ],
            [
                "id" => 60,
                "division_id" => 7,
                "name" => "Sunamganj",
                "bn_name" => "সুনামগঞ্জ"
            ],
            [
                "id" => 61,
                "division_id" => 8,
                "name" => "Sherpur",
                "bn_name" => "শেরপুর"
            ],
            [
                "id" => 62,
                "division_id" => 8,
                "name" => "Mymensingh",
                "bn_name" => "ময়মনসিংহ"
            ],
            [
                "id" => 63,
                "division_id" => 8,
                "name" => "Jamalpur",
                "bn_name" => "জামালপুর"
            ],
            [
                "id" => 64,
                "division_id" => 8,
                "name" => "Netrokona",
                "bn_name" => "নেত্রকোণা"
            ]
        ]);
    }
}
