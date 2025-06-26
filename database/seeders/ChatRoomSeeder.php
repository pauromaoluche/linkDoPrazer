<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_room_id' => 1, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 1, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 2, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 2, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 3, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 3, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 4, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 4, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 5, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 5, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 6, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 6, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 7, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 7, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 8, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 8, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 9, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 9, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 10, 'room_id_category' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 10, 'room_id_category' => 2, 'created_at' => now(), 'updated_at' => now()],
        ];

        ChatRoom::insert($categories);
    }
}
