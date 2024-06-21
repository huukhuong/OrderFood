<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Võ Hoàng Kiệt',
                'email' => 'admin6@test.com',
                'email_verified_at' => '2021-12-07 19:38:36',
                'password' => bcrypt('123456'),
                'remember_token' => 'test',
                'phone' => '0396527908',
                'address' => 'Long An',
                'role' => '1',
                'status' => '1'],
            ['name' => 'Trần Hữu Khương',
                'email' => 'admin2@test.com',
                'email_verified_at' => '2021-12-07 19:38:36',
                'password' => bcrypt('123456'),
                'remember_token' => 'test',
                'phone' => '0396527908',
                'address' => 'Long An',
                'role' => '0',
                'status' => '1'],
            ['name' => 'Lê Thái Thanh Sơn',
                'email' => 'user@test.com',
                'email_verified_at' => '2021-12-07 19:38:36',
                'password' => bcrypt('123456'),
                'remember_token' => 'test',
                'phone' => '0396527908',
                'address' => 'Long An',
                'role' => '0',
                'status' => '1']
            ,
            ['name' => 'Trần Văn Khang',
                'email' => 'user4@test.com',
                'email_verified_at' => '2021-12-07 19:38:36',
                'password' => bcrypt('123456'),
                'remember_token' => 'test',
                'phone' => '0396527908',
                'address' => 'Long An',
                'role' => '0',
                'status' => '1'],
        ]);
    }
}
