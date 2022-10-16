<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


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
}
