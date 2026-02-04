<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Animaux',
                'slug' => 'animaux',
                'description' => 'Nos animaux de compagnie et accessoires.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Outils',
                'slug' => 'outils',
                'description' => 'Outils et accessoires pour tous les besoins.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Graines',
                'slug' => 'graines',
                'description' => 'Graines et semences pour votre jardin.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chapeaux',
                'slug' => 'chapeaux',
                'description' => 'Chapeaux et accessoires de style.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plats',
                'slug' => 'plats',
                'description' => 'Plats fait maison et boissons.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
