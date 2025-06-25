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
            ['category_room_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['category_room_id' => 10, 'created_at' => now(), 'updated_at' => now()],
        ];

        ChatRoom::insert($categories);
    }
}
