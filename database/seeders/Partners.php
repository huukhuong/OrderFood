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
            [   'name' => 'Trần Văn Khang',
                'email' => 'tranvankhang@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],
            [   'name' => 'Nguyễn Văn A',
                'email' => 'tranvankhang@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],
            [   'name' => 'Nguyễn Văn B',
                'email' => 'tranvankhang@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],
            [   'name' => 'Nguyễn Văn C',
                'email' => 'tranvankhang@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],
            [   'name' => 'Nguyễn Văn D',
                'email' => 'tranvankhang@gmail.com',
                'phone' => '0396527908',
                'address' => 'Đặng chất ,Quận 8'
            ],

        ]);
    }
}
