<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset_type extends Model
{
    use HasFactory;

    protected $table  = 'assets_type';

    protected $fillable = ['id','name','created_at','updated_at'];

    public function asset_name(){
        return $this->hasMany(Asset::class ,'assets_type_id');
    }
}
