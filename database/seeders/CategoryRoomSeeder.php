<?php

namespace Database\Seeders;

use App\Models\CategoryRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Sexo Virtual', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gay(s)', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fetiches', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Relacionamentos', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Abertos', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Swingers', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Casais', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Solteiros', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aventuras', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'LGBTQIA+', 'created_at' => now(), 'updated_at' => now()],
        ];

        CategoryRoom::insert($categories);
    }
}
