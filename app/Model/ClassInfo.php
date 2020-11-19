<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model
{
    protected $table = 'class_info';
    
    protected $guarded = [];
    
    public function building_info()
    {
        return $this->belongsTo('App\Model\BuildingInfo');
    }
}
