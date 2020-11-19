<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BuildingInfo;
use App\Model\LockerInfo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $building_info = BuildingInfo::with('locker_infos','class_infos')->get();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user = Auth::user()->with('building_info','locker_info')->where('id',$user_id)->first();
            return view('welcome', compact('building_info','user'));
        }
        else{
            $user = null;
            return view('welcome', compact('building_info','user'));
        }
    }
}
