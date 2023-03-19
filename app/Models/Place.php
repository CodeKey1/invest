<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $table  = 'place';

    protected $fillable = ['id','name','status','place_category_id','city_id','created_at','updated_at'];

    public function cityPlace(){
        return  $this->belongsTo(City::class ,'city_id');
    }
    public function catePlace(){
        return  $this->belongsTo(Place_Category::class ,'place_category_id');
    }
    
    public function placeCatname(){
        return $this->belongsTo(Place_category::class ,'place_category_id');
    }
    public function cityname(){
        return $this->belongsTo(city::class ,'city_id');
    }
}
