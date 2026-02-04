<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les ids des catégories existantes
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        if (empty($categoryIds)) {
            $this->command->info('Aucune catégorie trouvée, créez des catégories avant les produits.');
            return;
        }
        // Insérer des produits
        DB::table('products')->insert([
            [
                'category_id' => $categoryIds[0],
                'name' => 'Poule marron',
                'slug' => 'poule-marron',
                'description' => 'Les poules adultes produiront des œufs tous les matins s\'ils sont nourris.',
                'price' => 800,
                'stock' => 20,
                'image' => 'brown_chicken.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[2],
                'name' => 'Graines de Chou-fleur',
                'slug' => 'graines-chou-fleur',
                'description' => 'Plantez-les au printemps. Prend 12 jours pour produire un grand chou-fleur. ',
                'price' => 80,
                'stock' => 50,
                'image' => 'graine_choufleur.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[1],
                'name' => 'Pioche en Cuivre',
                'slug' => 'pioche-cuivre',
                'description' => 'Peut briser les nœuds de cuivre en 2 coups. ',
                'price' => 2000,
                'stock' => 10,
                'image' => 'pioche_cuivre.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[3],
                'name' => 'Chapeau de Cowboy',
                'slug' => 'chapeau-cowboy',
                'description' => 'Le cuir est vieux et fissuré, mais étonnamment souple. Ça sent le moisi.  ',
                'price' => 10000,
                'stock' => 5,
                'image' => 'chapeau_cowboy.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[4],
                'name' => 'Salade du jardin',
                'slug' => 'salade-jardin',
                'description' => 'Une salade fraîche et croquante du jardin. ',
                'price' => 110,
                'stock' => 25,
                'image' => 'salade.png',
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
