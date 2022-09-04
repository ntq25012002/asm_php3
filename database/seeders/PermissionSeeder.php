<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
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
                'name' => 'Nhân viên',
                'description' => '',
                'key_code' => '',
                'parent_id' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Danh sách nhân viên',
                'description' => 'Danh sách nhân viên',
                'key_code' => 'list_staff',
                'parent_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Thêm nhân viên',
                'description' => 'Thêm nhân viên',
                'key_code' => 'add_staff',
                'parent_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sửa thông tin nhân viên',
                'description' => 'Sửa thông tin nhân viên',
                'key_code' => 'edit_staff',
                'parent_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Xóa nhân viên',
                'description' => 'Xóa nhân viên',
                'key_code' => 'delete_staff',
                'parent_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Loại phòng',
                'description' => 'Loại phòng',
                'key_code' => '',
                'parent_id' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Danh sách loại phòng',
                'description' => 'Danh sách loại phòng',
                'key_code' => 'list_room_type',
                'parent_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Thêm loại phòng',
                'description' => 'Thêm loại phòng',
                'key_code' => 'add_room_type',
                'parent_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sửa loại phòng',
                'description' => 'Sửa loại phòng',
                'key_code' => 'edit_room_type',
                'parent_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Xóa loại phòng',
                'description' => 'Xóa loại phòng',
                'key_code' => 'delete_room_type',
                'parent_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ];

        DB::table('permissions')->insert($data);
    }
}
