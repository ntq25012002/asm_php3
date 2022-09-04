<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'display_name' => 'Quản trị hệ thống'
            ],
            [
                'name' => 'Manager',
                'display_name' => 'Quản lý'
            ],
            [
                'name' => 'Staff',
                'display_name' => 'Nhân viên'
            ],
            [
                'name' => 'Guest',
                'display_name' => 'Khách hàng'
            ],
        ]);

    }
}
