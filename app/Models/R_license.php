<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;;

class R_license extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table  = 'request_license';

    protected $fillable = ['id','file','send_date','request_id','license_id','point','response_file','recived_date','state','created_at','updated_at','deleted_at'];

    public function L_Lisense(){

        return  $this->belongsTo(License::class ,'license_id');
    }
    public function R_Lisense(){

        return  $this->belongsTo(RequestP::class ,'request_id');
    }


}
