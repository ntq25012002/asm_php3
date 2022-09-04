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
                        'room_id' => $i,
                        'booking_id' => $i,
                        'checkin' => date('Y-m-d H:i:s'),
                        'checkout' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];  
        
        }

        DB::table('booking_details')->insert($data);
    }
}
