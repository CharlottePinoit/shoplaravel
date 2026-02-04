<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $order = DB::table('orders')->first();
        $product = DB::table('products')->first();

        DB::table('order_items')->insert([
            [

                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => 2,
                'unit_price' => $product->price,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
