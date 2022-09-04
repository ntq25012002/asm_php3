<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $data = [];
        for($i = 1; $i <= 10; $i++) {
            $data[] = [
                        'avatar' => '/storage/user/MgjQwfXFtZADlnToDAfr.png',
                        'name' => 'staff' . str::random(3) . $i,
                        'email' => 'poly'.$i.'@gmail.com',
                        'password' => Hash::make('123456'),
                        'role_id' => $i <= 4 ? $i : 4,
                        'address' => ' Hà Nội' . $i,
                        'phone_number' => '0987654322',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
        
        }

        DB::table('users')->insert($data);

    }
}
