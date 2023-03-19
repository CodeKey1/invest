<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $table  = 'auction';

    protected $fillable = ['id','name','date','label','note','created_at','updated_at'];

}
