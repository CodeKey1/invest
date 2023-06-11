<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Project extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table  = 'project';

    protected $fillable = ['id','feasibility_study','financial_capital','commercial_register','tax_card','site_sketch','company_reg','status','name','nid_photo','record','request_id','place_id','created_at','updated_at','deleted_at'];

    public function request_PJ(){
        return  $this->belongsTo(RequestP::class ,'request_id');
    }
}
