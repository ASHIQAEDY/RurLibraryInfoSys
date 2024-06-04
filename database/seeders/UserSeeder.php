<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed supervisors
        DB::table('users')->insert([
            [
                'name' => 'Ashiqa',

                'Category' => 'Admin',
                'password' => Hash::make('12345'), // Hashing the password
                'email' => 'Ashiqajun@VillageReadHub.edu.com',
                'UserLevel' => 0, // Setting UserLevel for supervisor


            ],
            [
                'name' => 'Jane Oman',

                'Category' => 'volunteer',
                'password' => Hash::make('123'), // Hashing the password
                'contact_information' => 'jane@VillageReadHub.com',
                'UserLevel' => 1, // Setting UserLevel for volunteer

            ],
            // Add more supervisor records as needed
        ]);


    }
}
