<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record_Add extends Model
{
    use HasFactory;

    protected $table  = 'record_add';

    protected $fillable = ['id','text','request_id','created_at','updated_at'];

    public function Record(){
        return $this->belongsTo(RequestP::class ,'request_id');
    }
}
