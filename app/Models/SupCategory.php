<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupCategory extends Model
{
    use HasFactory;

    protected $table  = 'sub_category';

    protected $fillable = ['id','name','category_id','created_at','updated_at'];

    public function supcate(){
        
        return  $this->belongsTo(Category::class ,'category_id');
    }
}
