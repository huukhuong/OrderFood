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
        DB::table('products')-> insert([
            [   'name' => 'Pizza 1',
                'description' => 'Pizza rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '1',
                'status' => '1'
            ],
            [   'name' => 'Pizza 2',
                'description' => 'Pizza2 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '1',
                'status' => '1'
            ],
            [   'name' => 'Pizza 3',
                'description' => 'Pizza3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '1',
                'status' => '1'
            ],
            [   'name' => 'Hamberger 1',
                'description' => 'Hamberger rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [   'name' => 'Hamberger 2',
                'description' => 'Hamberger2 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [   'name' => 'Hamberger 3',
                'description' => 'Hamberger3 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [   'name' => 'Gà Rán 1',
                'description' => 'Gà Rán rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '3',
                'status' => '1'
            ],
            [   'name' => 'Gà Rán 2',
                'description' => 'Gà Rán2 rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '3',
                'status' => '1'
            ],
            [   'name' => 'Gà Rán 3',
                'description' => 'Gà Rán rất ngon',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'meow.jpg',
                'category_id' => '3',
                'status' => '1'
            ]
        ]);
    }
}
