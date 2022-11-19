<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Supplier extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert([
            [
                'name' => 'Thực Phẩm Phúc Đạt - Công Ty TNHH XNK Quốc Tế Phúc Đạt',
                'address' => '83 Phan Văn Hân, P. 17, Q. Bình Thạnh, Tp. Hồ Chí Minh',
                'description' => '
                               info@phucdatfood.com',
                'status' => '1',
                'address' => 'Đặng chất ,Quận 8',
                'contact' => "0931 327 379"
            ],
            [
                'name' => 'Thực Phẩm Đông Lạnh Khánh Hà - Công Ty TNHH Thực Phẩm Khánh Hà',
                'address' => 'Lô B24 Khu Đấu Giá 3Ha, P. Phúc Diễn, Q. Bắc Từ Liêm, Hà Nội',
                'description' => '
                                    thucphamkhanhha@gmail.com',
                'status' => '1',
                'address' => 'Đặng chất ,Quận 8',
                'contact' => "0966 180 688"
            ],
            [
                'name' => 'Thực Phẩm Đông Lạnh Thành Nam - Công Ty TNHH MTV Nông Lâm Sản Thành Nam',
                'address' => '168/42 DX006, KP8, P. Phú Mỹ, Thủ Dầu Một, Bình Dương',
                'description' => '
thanhnamfood123@gmail.com',
                'status' => '1',
                'address' => 'Đặng chất ,Quận 8',
                'contact' => "0971001003"
            ],

        ]);
    }
}
