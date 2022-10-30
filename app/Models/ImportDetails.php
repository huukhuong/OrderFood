<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportDetails extends Model
{
    use HasFactory;
    protected $table = "imports_details";
    public function products_linked(){
        return $this ->belongsTo('App\Models\Products','product_id', 'id') ;
    }
}
