<?php

namespace App\Http\Controllers;

use App\Exports\AttendancesExport;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Maatwebsite\Excel\Facades\Excel;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $absen = Attendance::with('user')->get();
        return view('absen', ['absenList' => $absen]);
    }

    public function detail($id){

        $absen = Attendance::where('id', $id)->with('user')->first();
        return view('detail', ['absen' => $absen]);
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

    public function pulang(){
        // $ip = request()->ip(); // Activate this if you want to get server ip
        
        // dd(now()->toDateString());
        $user_id = auth()->user()->id;
        $today_date = now()->toDateString();
        $in_time = now()->toTimeString();
        // dd($in_time);
        $position = Location::get('111.94.60.43');
        $city = $position->cityName;

        $pulang = Attendance::where('presence_date', $today_date)->where('user_id', $user_id)->first();
        $pulang->update([
            'presence_out_time' => $in_time,
            'presence_out_loc' => $city,
            'keterangan' => "Sudah Pulang",
        ]);
        
        if($pulang){
            //redirect dengan pesan sukses
            return redirect('/user/home')->with(['status' => 'Anda Telah Pulang!']);
        }else{
            //redirect dengan pesan error
            return redirect('/user/home')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function izin_form(){

        $user_id = auth()->user()->id;
        return view('izin', ['user_id' => $user_id]);
    }

    public function izin(Request $request){
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
            'status' => "Izin",
            'keterangan' => $request->input('keterangan'),
            'presence_enter_time' => $in_time,
            'presence_enter_loc' => $city,
        ]);
        
        if($hadir){
            //redirect dengan pesan sukses
            return redirect('/user/home')->with(['status' => 'Anda Telah Izin!']);
        }else{
            //redirect dengan pesan error
            return redirect('/user/home')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function export() 

    {
        return Excel::download(new AttendancesExport, 'data-absen.xlsx');
    }
}
