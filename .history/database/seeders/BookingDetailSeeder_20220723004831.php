<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        for($i = 1; $i <= 10; $i++) {
            $data[] = [
                        'name' => 'booking ' . $i,
                        'phone_number' => $i,
                        'email' => 'guest' . $i.'@gmail.com',
                        'adults' => $i,
                        'children' => $i - 1,
                        'price' => $i,
                        // 'payment' => true,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];  
        
        }

        DB::table('bookings')->insert($data);
    }
}
