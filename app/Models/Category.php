<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table  = 'category';

    protected $fillable = ['id','name','created_at','updated_at'];

    public function cat_request(){
        return $this->hasMany(RequestP::class);
    }
    public function cat_license(){
        return $this->hasMany(C_license::class);
    }
    public function sub_cat(){
        return $this->hasMany(SubCategory::class);
    }
}
