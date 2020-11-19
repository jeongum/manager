<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LockerInfo extends Model
{
    protected $table = 'locker_info';
    
    protected $guarded = [];
    
    public function building_info()
    {
        return $this->belongsTo('App\Model\BuildingInfo');
    }
    
    public function owner_infos()
    {
        return $this->hasMany('App\Model\OwnerInfo')->orderBy('position', 'asc');
    }
    
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
