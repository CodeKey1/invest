<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table  = 'city';

    protected $fillable = ['id','name','gov_id','created_at','updated_at'];

    public function reqname(){
        return $this->hasMany(RequestP::class ,'city_id');
    }
    
    public function place_name(){
        return $this->hasMany(Place::class ,'city_id');
    }

    public function govname(){
        return $this->belongsTo(gov::class ,'gov_id');
    }
}
