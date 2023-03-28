<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table  = 'offer';

    protected $fillable = ['id','recived','investor','phone','work_date','status','delivery_record','note','contract_cost','contract_period','increase_rate','assets_id','auction_id','contract_type_id','created_at','updated_at'];

    public function asset_name(){
        return $this->belongsTo(Asset::class ,'assets_id');
    }
    public function auction_name(){
        return $this->belongsTo(Auction::class ,'auction_id');
    }
    public function contract_type(){
        return $this->belongsTo(Contract_type::class ,'contract_type_id');
    }


}
