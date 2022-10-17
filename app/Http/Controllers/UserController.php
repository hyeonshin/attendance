<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Models\Attendance;
use Maatwebsite\Excel\Facades\Excel;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $user = User::all();
        return view('adminHome', ['userList' => $user]);
    }

    public function input(){

        $user = User::all();
        return view('create', ['userList' => $user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'position' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'type' => $request->input('position'),
        ]);

        if($user){
            //redirect dengan pesan sukses
            return redirect('/admin/home')->with(['status' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/home')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id){

        $user = User::where('id', $id)->first();
        return view('edit', ['user' => $user]);
    }

    public function change($id){

        $user = User::where('id', $id)->first();
        return view('change', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $user = User::where('id', $id)->first();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        if($user){
             //redirect dengan pesan sukses
             return redirect('/admin/home')->with(['status' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/home')->with(['status' => 'Data Gagal Diupdate!']);
        }
    }

    public function update_2(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);

        $user = User::where('id', $id)->first();
        $user->update([
            'password' => bcrypt($request->input('name')),
        ]);

        if($user){
             //redirect dengan pesan sukses
             return redirect('/admin/home')->with(['status' => 'Password Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/home')->with(['status' => 'Password Gagal Diupdate!']);
        }
    }

    public function activate(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        $user->update([
            'is_active' => "Yes",
        ]);

        if($user){
             //redirect dengan pesan sukses
             return redirect('/admin/home')->with(['status' => 'Status Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/home')->with(['status' => 'Status Gagal Diupdate!']);
        }
    }

    public function deactive(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        $user->update([
            'is_active' => "No",
        ]);

        if($user){
             //redirect dengan pesan sukses
             return redirect('/admin/home')->with(['status' => 'Status Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/home')->with(['status' => 'Status Gagal Diupdate!']);
        }
    }

    public function destroy($id){

        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect('/admin/home')->with(['status' => 'Data Berhasil Dihapus!']);
    }

    public function export() 

    {
        return Excel::download(new UsersExport, 'data-karyawan.xlsx');
    }

    public function index_user(){
        // $ip = request()->ip(); // Activate this if you want to get server ip
        
        // dd(now()->toDateString());
        $position = Location::get('111.94.60.43');
        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->first();
        $att = Attendance::where('presence_date', today()->toDateString())->where('user_id', '=', $user_id)->first();
        return view('home', ['userProfile' => $user, 'attendance' => $att, 'position' => $position]);
    }

    public function profile(){
        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->first();
        return view('profile', ['userProfile' => $user]);
    }
}
