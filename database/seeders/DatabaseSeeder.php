<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'user_id' => Str::uuid(),
            'name' => 'admin megawealth',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'user_id' => Str::uuid(),
            'name' => 'satu',
            'email' => 'satu@email.com',
            'password' => bcrypt('12341234'),
            'role' => 'member',
        ]);
    }
}
