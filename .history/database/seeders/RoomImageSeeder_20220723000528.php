<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomImageSeeder extends Seeder
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
                        'image' => 'image' . $i,
                        'image_path' => 'image_path' . $i,
                        'room_id' => $i,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];  
        
        }

        DB::table('room_images')->insert($data);
    }
}
