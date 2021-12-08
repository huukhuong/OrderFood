<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')-> insert([
            [   'name' => 'Pizza'
            ],
            [   'name' => 'Hamberger'
            ],
            [   'name' => 'Khoai Tây'
            ],
            [   'name' => 'Gà Rán'
            ],


        ]);
    }
}
