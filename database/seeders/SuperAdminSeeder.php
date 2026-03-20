<?php

namespace Database\Seeders;

use App\Models\users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        users::updateOrCreate([
            'username' => "SuperAdmin",
            'email'    => "admin@gamil.com",
            'password'    => Hash::make("admin@123"),
            'phone'    => "0",
            'telegram'    => "https://t.me/sothea",
            'role'    => "superAdmin",
        ]);
    }
}
