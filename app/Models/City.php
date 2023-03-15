<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table  = 'city';

    protected $fillable = ['id','name','created_at','updated_at'];

    public function cityname(){
        return $this->hasMany(RequestP::class ,'city_id');
    }
}
