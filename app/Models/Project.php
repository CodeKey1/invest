<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table  = 'project';

    protected $fillable = ['id','feasibility_study','financial_capital','commercial_register','tax_card','site_sketch','location_string','status','name','nid_photo','request_id','place_id','created_at','updated_at'];
}
