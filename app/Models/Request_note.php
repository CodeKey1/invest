<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_note extends Model
{
    use HasFactory;

    protected $table  = 'request_notes';

    protected $fillable = ['id','notes','request_id','created_at','updated_at'];

    public function R_note(){
        return  $this->belongsTo(RequestP::class ,'request_id');
    }

}
