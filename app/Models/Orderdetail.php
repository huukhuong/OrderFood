<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    public $timestamps = false;
    public function products_linked(){
        return $this ->belongsTo('App\Models\Products','product_id', 'id') ;
    }
}
