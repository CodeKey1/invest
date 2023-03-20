<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class C_license extends Model
{
    use HasFactory;

    protected $table  = 'c_license';

    protected $fillable = ['category_id','license_id','created_at','updated_at'];

    public function license_cat(){

        return  $this->belongsTo(Category::class ,'category_id');
    }
    public function license_cate(){

        return  $this->belongsTo(Category::class ,'category_id');
    }
    public function license(){

        return  $this->belongsTo(License::class ,'license_id');
    }
}
