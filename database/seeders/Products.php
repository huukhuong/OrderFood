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
                'name' => 'Pizza Hải Sản Pesto Xanh',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza0.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza Hải Sản Nhiệt Đới',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza1.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza Hải Sản Cocktail',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza2.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza Tôm Cocktail',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza3.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza Aloha',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza4.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza Thịt Xông Khói',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza5.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza Thịt Nguội',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza6.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Pizza Gà Nướng 3 Vị',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'pizza7.png',
                'category_id' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Hamburger gà nướng 3 vị',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'hamburger0.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [
                'name' => 'Hamburger tôm',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'hamburger1.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [
                'name' => 'Hamburger bò lúc lắc',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'hamburger2.jpg',
                'category_id' => '2',
                'status' => '1'
            ],
            [
                'name' => 'Gà Rán truyền thống',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'ga-ran1.jpg',
                'category_id' => '3',
                'status' => '1'
            ],
            [
                'name' => 'Gà Rán giòn cay kèm khoai tây',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'ga-ran2.jpg',
                'category_id' => '3',
                'status' => '1'
            ],
            [
                'name' => 'Gà Rán không cay kèm khoai tây size lớn',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos ipsa libero itaque voluptates excepturi numquam ea cumque voluptatem ipsam, dolores, quos aut optio sed iure. Aspernatur minus ut nulla maiores?',
                'quantity' => '100',
                'price' => '10000',
                'image' => 'ga-ran3.jpg',
                'category_id' => '3',
                'status' => '1'
            ]
        ]);
    }
}
