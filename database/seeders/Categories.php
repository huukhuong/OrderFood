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
            [   'name' => 'Hamburger'
            ],
            [   'name' => 'Gà Rán'
            ],
        ]);
    }
}
