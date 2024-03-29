<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";

    public function user_linked(){
        return $this ->belongsTo('App\Models\User','user_id', 'id') ;
    }
    public function partners_linked(){
        return $this ->belongsTo('App\Models\Partners','id_partner', 'id') ;
    }
}
