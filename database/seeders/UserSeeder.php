<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create super admin user
        $superAdmin = User::create([
            'name' => 'Moch Fikri Khoirurrizal',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123123123')
        ]);
        $superAdmin->profile()->create([
            // 'user_id' => $superAdmin->id,
            'gender' => 'L',
            'phone_number' => '123456781111',
            'address' => ''
        ]);

        // Create admin user
        $admin = User::create([
            'name' => 'Tukang Manage',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123123')
        ]);
        $admin->profile()->create([
            // 'user_id' => $admin->id,
            'gender' => 'L',
            'phone_number' => '123456782222',
            'address' => ''
        ]);

        // Create writer user
        $writer = User::create([
            'name' => 'Penulis Handal',
            'email' => 'writer@gmail.com',
            'password' => Hash::make('123123123')
        ]);
        $writer->profile()->create([
            // 'user_id' => $writer->id,
            'gender' => 'L',
            'phone_number' => '123456783333',
            'address' => ''
        ]);

        // Assign roles to users
        $superAdmin->assignRole('super-admin');
        $admin->assignRole('admin');
        $writer->assignRole('writer');
    }
}
