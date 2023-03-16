<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place_Category extends Model
{
    use HasFactory;

    protected $table  = 'place_category';

    protected $fillable = ['id','name','created_at','updated_at'];

    public function placename(){
        return $this->hasMany(Place::class ,'place_category_id');
    }
}
