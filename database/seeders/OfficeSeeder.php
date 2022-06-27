<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Office::create([
            'name'=> 'Memphis Office',
            'address'=>'2584 Madison Ave',
            'contact_name'=>'Natalee Sheryl',
            'phone_number'=>'+12155399845',
            'image_link'=>'office_1.jpg'
        ]);

        Office::create([
            'name'=> 'San Antonio Office',
            'address'=>'112 East Pecan Suite',
            'contact_name'=>'Ryan Bond',
            'phone_number'=>'+2103773200',
            'image_link'=>'office_2.jpg'
        ]);

        Office::create([
            'name'=> 'Washington Office',
            'address'=>'456 Washington Ave',
            'contact_name'=>'Ennick Douma',
            'phone_number'=>'+2028005258',
            'image_link'=>'office_3.jpg'
        ]);

        Office::create([
            'name'=> 'Colombus Office',
            'address'=>'175 South Third Street',
            'contact_name'=>'Gemma Chan',
            'phone_number'=>'+6142800204',
            'image_link'=>'office_4.jpg'
        ]);

        Office::create([
            'name'=> 'New York Office',
            'address'=>'22 Cortlandt Street',
            'contact_name'=>'Nathanael',
            'phone_number'=>'+2126932377',
            'image_link'=>'office_5.jpg'
        ]);

        Office::create([
            'name'=> 'Indonesia Office',
            'address'=>'Foresta Business Loft Lot. L1',
            'contact_name'=>'Mickey Chen',
            'phone_number'=>'+6285215678923',
            'image_link'=>'office_6.jpg'
        ]);
    }
}
