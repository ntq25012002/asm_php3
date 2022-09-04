<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
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
                        'name' => 'name room  ' . $i,
                        'area' => $i * 10,
                        'feature_image' => 'feature_image room ' . $i,
                        'description' => 'description room type' . $i,
                        'room_type_id' => $i,
                        'price' => $i,
                        'sale_price' => $i,
                        'status' => 0,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];  
        
        }

        DB::table('rooms')->insert($data);
        
    }
}
