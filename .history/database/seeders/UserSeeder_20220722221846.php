<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for($i = 11; $i <= 21; $i++) {
            $data[] = [
                        'avatar' => '/storage/user/MgjQwfXFtZADlnToDAfr.png',
                        'name' => 'staff' . str::random(3) . $i,
                        'email' => 'poly'.$i.'@gmail.com',
                        'password' => Hash::make('123456'),
                        'role_id' => $i <= 4 ? $i : 4,
                        'address' => ' Hà Nội' . $i,
                        'phone_number' => '098765432' . $i,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
        
        }

        DB::table('users')->insert($data);
    }
}
