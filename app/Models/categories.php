<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    public $timestamps = false;
    public function products(){
        return $this ->hasMany('App\Models\products','id', 'id');
    }

}
