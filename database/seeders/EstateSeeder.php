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

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Rent',
            'building_type'=> 'Apartment',
            'status'=> 'Open',
            'price'=> '2500000',
            'location'=>'3054 Deans Lane, NY',
            'image_link'=>'apartment_2.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Sale',
            'building_type'=> 'Apartment',
            'status'=> 'Open',
            'price'=> '5800000',
            'location'=>' 813 Howard Street, USA',
            'image_link'=>'apartment_3.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Sale',
            'building_type'=> 'House',
            'status'=> 'Open',
            'price'=> '2300000',
            'location'=>'442 Hamilton Drive, WA',
            'image_link'=>'house_2.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Rent',
            'building_type'=> 'House',
            'status'=> 'Open',
            'price'=> '180000',
            'location'=>'1101 Angus Road, NY',
            'image_link'=>'house_3.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Rent',
            'building_type'=> 'House',
            'status'=> 'Open',
            'price'=> '120000',
            'location'=>'4803 Wellesley Street, ON',
            'image_link'=>'house_4.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Sale',
            'building_type'=> 'Apartment',
            'status'=> 'Open',
            'price'=> '6600000',
            'location'=>'207 Queens Quay West, ON',
            'image_link'=>'apartment_4.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Rent',
            'building_type'=> 'Apartment',
            'status'=> 'Open',
            'price'=> '45000',
            'location'=>'2456 Ella Street, CA',
            'image_link'=>'apartment_5.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Rent',
            'building_type'=> 'Apartment',
            'status'=> 'Open',
            'price'=> '50000',
            'location'=>'8028 Fella Street, CA',
            'image_link'=>'apartment_6.jpg'
        ]);

        Estate::create([
            'estate_id'=> Str::uuid(),
            'sales_type'=> 'Rent',
            'building_type'=> 'Apartment',
            'status'=> 'Open',
            'price'=> '9500000',
            'location'=>'4561 Flinderation Road, IL',
            'image_link'=>'apartment_7.png'
        ]);

    }
}
