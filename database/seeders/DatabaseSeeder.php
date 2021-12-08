<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this -> call(User::class);
        $this -> call(Categories::class);
        $this -> call(Products::class);
        $this ->call(Order::class);
        $this -> call(Orderdetail::class);
    }
}
