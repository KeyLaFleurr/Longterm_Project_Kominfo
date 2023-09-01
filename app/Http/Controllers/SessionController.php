<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;




class SessionController extends Controller
{
    
    function index ()
    {
        return view("sesi/index");
    }
    function login(Request $request )
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',

        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
return redirect('pendataan')->with('success', ' Berhasil Login ');
        } else {

            
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');

        }

        
    }


    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout');
    }

    function register() {
        return view('sesi/registrasi');
    }
    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:7',
        ],[
            
            'name.required'=>'Nama wajib diisi',
            'email.email'=>'Silahkan masukkan email yang valid',
            'email.required'=>'Email wajib diisi',
            'email.unique'=>'Email sudah pernah digunakan',
            'password.required'=>'Password wajib diisi',
            'password.min'=>'Minumum 6 karakter',
        ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password)
            ];

            User::create($data);

        $infologin = [
            //'name'=>$request->name,
            'email'=>$request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infologin)){

            return redirect('pendataan')->with('success', Auth::user()->name . ' Berhasil Login ');
        
} else {
            return redirect('sesi')->withErrors('Password yang dimasukkan tidak valid');

        }
    }
}

