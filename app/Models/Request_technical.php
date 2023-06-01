<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Request_technical extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table  = 'request_technical_decision';

    protected $fillable = ['id','note','date','request_id','created_at','updated_at','deleted_at'];

    public function R_tec(){
        return  $this->belongsTo(RequestP::class ,'request_id');
    }

}
