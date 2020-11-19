<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OwnerInfo extends Model
{
    protected $table = 'owner_info';
    
    protected $guarded = [];
    
    public function locker_info()
    {
        return $this->belongsTo('App\Model\LockerInfo');
    }
    public function building_info()
    {
        return $this->belongsTo('App\Model\BuildingInfo');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
