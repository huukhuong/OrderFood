<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Partners extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners') ->insert([
            [   'name' => 'GRAPFOOD',
                'email' => 'grapfood@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],
            [   'name' => 'BEAMIN',
                'email' => 'beaming@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],
            [   'name' => 'AHAMOVE',
                'email' => 'ahamove@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],
            [   'name' => 'GOFOOD',
                'email' => 'gofood@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],


        ]);
    }
}
