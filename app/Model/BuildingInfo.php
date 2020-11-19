<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuildingInfo extends Model
{
    protected $table = 'locker_manager.building_info';
    
    protected $guarded = [];
    
    public function locker_infos()
    {
        return $this->hasMany('App\Model\LockerInfo')->orderBy('position', 'asc');
    }
    public function owner_infos()
    {
        return $this->hasMany('App\Model\OwnerInfo')->orderBy('position', 'asc');
    }
    public function class_infos()
    {
        return $this->hasMany('App\Model\ClassInfo')->orderBy('position', 'asc');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
