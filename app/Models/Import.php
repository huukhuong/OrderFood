<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $table = "imports";
    public function user_linked(){
        return $this ->belongsTo('App\Models\User','user_id', 'id') ;
    }

    public function supplier_linked(){
        return $this ->belongsTo(Supplier::class,'supplier_id', 'id') ;
    }
}
