<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place_Category extends Model
{
    use HasFactory;

    protected $table  = 'place_Category';

    protected $fillable = ['id','name','created_at','updated_at'];

    public function PC(){
        return  $this->belongsTo(Place::class ,'place_category_id');
}



    public function placename(){
        return $this->hasMany(Place::class ,'place_category_id');
    }
}
