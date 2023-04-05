<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_places extends Model
{
    use HasFactory;

    protected $table  = 'request_suggested_places';

    protected $fillable = ['id','suggested_places','request_id','created_at','updated_at'];

    public function Request(){
        return  $this->belongsTo(RequestP::class ,'request_id');
    }
    public function Req_place(){
        return  $this->belongsTo(Place::class ,'suggested_places');
    }

}
