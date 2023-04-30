<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;

    protected $table  = 'export';

    protected $fillable = ['id','export_id','export_name','export_side','export_date','export_note','export_file','state','created_at','updated_at'];
}

