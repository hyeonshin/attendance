<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function hadir(){
        // $ip = request()->ip(); // Activate this if you want to get server ip
        
        // dd(now()->toDateString());
        $user_id = auth()->user()->id;
        $today_date = now()->toDateString();
        $in_time = now()->toTimeString();
        // dd($in_time);
        $position = Location::get('111.94.60.43');
        $city = $position->cityName;
        
        $hadir = Attendance::create([
            'user_id' => $user_id,
            'presence_date' => $today_date,
            'status' => "Hadir",
            'presence_enter_time' => $in_time,
            'presence_enter_loc' => $city,
        ]);
        
        if($hadir){
            //redirect dengan pesan sukses
            return redirect('/user/home')->with(['status' => 'Anda Telah Hadir!']);
        }else{
            //redirect dengan pesan error
            return redirect('/user/home')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }
}
