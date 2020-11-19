<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LockerInfo;
use App\Model\BuildingInfo;
use App\Model\OwnerInfo;
use App\User;
use Illuminate\Support\Facades\Auth;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = BuildingInfo::with('locker_infos','owner_infos')->get();
        $available = 0;
        $total = 0;
        foreach($buildings as $building){
            foreach($building->owner_infos as $owner){
                if($owner->broken == 0){
                    $total++;
                    if($owner->owner_id == null){
                        $available++;
                    }
                }
            }
            
        }
        $user_id = Auth::user()->id;
        $user = Auth::user()->with('building_info','locker_info')->where('id',$user_id)->first();
        return view('locker.index', compact('buildings','total','available','user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this_locker = LockerInfo::find($id);
        $building = BuildingInfo::find($this_locker->building_info_id);
        
        $lockers = LockerInfo::where('building_info_id', $building->id)->with('owner_infos')->get();
        
        $user_id = Auth::user()->id;
        $user = Auth::user()->with('building_info','locker_info')->where('id',$user_id)->first();
        
        $users = User::all();
        return view('locker.detail',compact('this_locker','building','lockers','user','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $owner = OwnerInfo::find($request->owner_id);
        $id = $owner->locker_info_id;
        $owner->owner_id = Auth::user()->id;
        $owner->save();
        
        $user = Auth::user();
        $user -> has_locker = 1;
        $user->building_info_id = LockerInfo::find($id)->building_info_id;
        $user->locker_info_id = $id;
        $user->owner_info_id = $owner->id;
        $user->save();
        
        return redirect()->route('lockers.show',$id);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $owner = OwnerInfo::find($user->owner_info_id);
        
        $user->has_locker = 0;
        $user->locker_info_id = null;
        $user->building_info_id = null;
        $user->owner_info_id = null;
        
        $owner->owner_id = null;
        
        $user->save();
        $owner->save();
        
        
        return redirect()->route('lockers.index');
    }
}
