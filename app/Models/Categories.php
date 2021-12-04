<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    // public $timestamps = false;
    public function products()
    {
        return $this->hasMany('App\Models\Products', 'id', 'id');
    }
}
