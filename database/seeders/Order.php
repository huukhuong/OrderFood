<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('orders') ->insert([
          [   'user_id' => '3',
              'address' => 'Quận 8',
              'total' => '40000',
              'status' => '1'
          ],
          [   'user_id' => '4',
              'address' => 'Quận 9',
              'total' => '40000',
              'status' => '1'
          ],
          [   'user_id' => '5',
              'address' => 'Quận 3',
              'total' => '70000',
              'status' => '1'
          ],
      ]);
    }
}
