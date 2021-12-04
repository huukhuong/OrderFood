<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    public function category_linked(){
        return $this ->belongsTo('App\Models\Categories','category_id', 'id') ;
    }
}
