<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Request_note extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table  = 'request_notes';

    protected $fillable = ['id','notes','request_id','license_id','sender','created_at','updated_at','deleted_at'];

    public function R_note(){
        return  $this->belongsTo(RequestP::class ,'request_id');
    }

    public function sender_name(){
        return  $this->belongsTo(User::class ,'sender');
    }

    public function note_license(){
        return  $this->belongsTo(License::class ,'license_id');
    }

}
