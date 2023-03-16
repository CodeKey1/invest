<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gov extends Model
{
    use HasFactory;

    protected $table  = 'gov';

    protected $fillable = ['id','name','created_at','updated_at'];

    public function cityname(){
        return $this->hasMany(City::class ,'gov_id');
    }
}
