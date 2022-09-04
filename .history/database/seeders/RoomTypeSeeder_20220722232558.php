<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [];
        for($i = 1; $i <= 10; $i++) {
            $data[] = [
                        'name' => 'name equipment ' . $i,
                        'image' => 'image equipment ' . $i,
                        'description' => 'description equipment' . $i,
                        'adults' => $i,
                        'children' => $i - 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];  
        
        }

        DB::table('room_types')->insert($data);

    }
}
