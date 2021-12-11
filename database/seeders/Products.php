<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Pizza 1',
                'description' => 'Pizza rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza0.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza 2',
                'description' => 'Pizza2 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza1.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza 3',
                'description' => 'Pizza3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza2.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza 3',
                'description' => 'Pizza3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza3.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza 3',
                'description' => 'Pizza3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza4.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza 3',
                'description' => 'Pizza3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza5.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza 3',
                'description' => 'Pizza3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza6.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza 3',
                'description' => 'Pizza3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza7.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Hamburger 1',
                'description' => 'Hamburger rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'hamburger0.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [
                'name' => 'Hamburger 2',
                'description' => 'Hamburger2 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'hamburger1.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [
                'name' => 'Hamburger 3',
                'description' => 'Hamburger3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'hamburger2.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [
                'name' => 'Gà Rán 1',
                'description' => 'Gà Rán rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'ga-ran1.jpg',
                'category_id' => '3',
                'status' => '1'
            ],
            [
                'name' => 'Gà Rán 2',
                'description' => 'Gà Rán2 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'ga-ran2.jpg',
                'category_id' => '3',
                'status' => '1'
            ],
            [
                'name' => 'Gà Rán 3',
                'description' => 'Gà Rán rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'ga-ran3.jpg',
                'category_id' => '3',
                'status' => '1'
            ]
        ]);
    }
}
