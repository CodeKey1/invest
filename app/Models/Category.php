<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table  = 'category';

    protected $fillable = ['id','name','created_at','updated_at'];

    public function category_project(){
        return $this->hasMany(RequestP::class);
    }
    public function cat_other(){
        return $this->hasMany(SupCategory::class);
    }
}
