<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestP extends Model
{
    use HasFactory;

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
        'Self_financing',
        'recived_date',
        'capital',
        'phone',
        'state',
        'sub_ctegory_id',
        'category_id',
        'city_id',
        'created_at',
        'updated_at',
    ];

    public function categoryname(){
        return  $this->belongsTo(Category::class ,'category_id');
    }
    public function subCat(){
        return  $this->belongsTo(SubCategory::class ,'sub_ctegory_id');
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
}
