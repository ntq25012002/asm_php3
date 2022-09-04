<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'avatar' => '/storage/user/MgjQwfXFtZADlnToDAfr.png',
                'name' => 'staff',
                'email' => 'poly@gmail.com',
                'password' => Hash::make('123456'),
                'email' => 'poly@gmail.com',
                'role_id' => 1,
                'address' => ' Hà Nội ',
                'phone_number' => 0987654321,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ];

        DB::table('roles')->insert($data);
    }
}
