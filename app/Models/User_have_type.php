<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_have_type extends Model
{
    use HasFactory;

    protected $table  = 'user_have_type';

    protected $fillable = ['id','type_id','city_id','license_id','created_at','updated_at'];

    public function city_name(){
        return  $this->belongsTo(City::class ,'city_id');
    }
    public function user_name(){
        return  $this->belongsTo(User::class ,'user_id');
    }
    public function license_name(){
        return  $this->belongsTo(License::class ,'license_id');
    }

}
