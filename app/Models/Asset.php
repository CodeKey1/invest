<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table  = 'assets';

    protected $fillable = ['id','number','name','address','contract_cost','contract_period','status','note','city_id','assets_type_id','contract_type_id','created_at','updated_at'];

    public function city_name(){
        return $this->belongsTo(City::class ,'city_id');
    }
    public function asset_type(){
        return $this->belongsTo(Asset_type::class ,'assets_type_id');
    }
    public function contract_type(){
        return $this->belongsTo(Contract_type::class ,'contract_type_id');
    }

    public function offer_name(){
        return $this->hasMany(Offer::class ,'assets_id');
    }
}
