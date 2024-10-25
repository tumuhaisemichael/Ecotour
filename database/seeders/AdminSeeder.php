<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com', // Use a suitable email for admin
            'password' => Hash::make('password123'), // Be sure to use a secure password
            'role' => 'admin',
            'phone_number' => '1234567890', // Add if needed
            'profile_picture' => null, // Set if there's a default picture
            'bio' => 'This is the admin user of the application.',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
