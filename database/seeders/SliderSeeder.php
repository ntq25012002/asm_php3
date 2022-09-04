<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
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
                        'title' => 'title silder ' . $i,
                        'image' => 'image slider ' . $i,
                        'description' => 'description ' . $i,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];  
        
        }

        DB::table('sliders')->insert($data);
    }
}
