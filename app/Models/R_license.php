<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_license extends Model
{
    use HasFactory;


    protected $table  = 'request_license';

    protected $fillable = ['id','file','request_id','license_id','created_at','updated_at'];

    public function L_Lisense(){

        return  $this->belongsTo(License::class ,'license_id');
    }
    public function R_Lisense(){

        return  $this->belongsTo(RequestP::class ,'request_id');
    }


}
