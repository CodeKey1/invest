<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class RequestP extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table  = 'request';

    protected $fillable = [
        'id',
        'name',
        'owner_type',
        'owner_name',
        'address',
        'representative_name',
        'representative_id',
        'NID',
        'size',
        'size_type',
        'self_financing',
        'recived_date',
        'capital',
        'currency_type',
        'phone',
        'state',
        'technical_state',
        'sub_category_id',
        'category_id',
        'city_id',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = ['recived_date'=>'datetime'];

    public function categoryname(){
        return  $this->belongsTo(Category::class ,'category_id');
    }
    public function subCat(){
        return  $this->belongsTo(SubCategory::class ,'sub_category_id');
    }
    public function city(){
        return  $this->belongsTo(City::class ,'city_id');
    }
    public function rl(){
        return  $this->hasMany(R_license::class ,'request_id');
    }
    public function Project_Rq(){
        return  $this->hasMany(Project::class ,'request_id');
    }
    public function req_place(){
        return  $this->hasMany(Request_places::class ,'request_id');
    }

}
