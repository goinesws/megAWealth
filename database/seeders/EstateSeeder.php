<?php

namespace Database\Seeders;

use App\Models\Estate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Sale',
            'building_type'=> 'House',
            'status'=> 'Open',
            'price'=> '1000000',
            'location'=>'2606 Buffalo Creek Road, TN',
            'image_link'=>'house_1.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Rent',
            'building_type'=> 'Apartment',
            'status'=> 'Open',
            'price'=> '350000',
            'location'=>'2059 James Street, NY',
            'image_link'=>'apartment_1.jpg'
        ]);
    }
}
