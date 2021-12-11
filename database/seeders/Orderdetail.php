<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Orderdetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_detail') ->insert([
            [   'order_id' => '1',
                'product_id' => '1',
                'amount' => '1',
                'price' => '10000'
            ],
            [   'order_id' => '1',
                'product_id' => '2',
                'amount' => '1',
                'price' => '10000'
            ],
            [   'order_id' => '1',
                'product_id' => '3',
                'amount' => '1',
                'price' => '10000'
            ],

            [   'order_id' => '2',
                'product_id' => '1',
                'amount' => '2',
                'price' => '10000'
            ],
            [   'order_id' => '2',
                'product_id' => '2',
                'amount' => '2',
                'price' => '10000'
            ],
            [   'order_id' => '3',
                'product_id' => '2',
                'amount' => '3',
                'price' => '10000'
            ],
            [   'order_id' => '3',
                'product_id' => '3',
                'amount' => '4',
                'price' => '10000'
            ]
        ]);
    }
}
