<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract_type extends Model
{
    use HasFactory;
    
    protected $table  = 'contract_type';

    protected $fillable = ['id','name','created_at','updated_at'];
}
