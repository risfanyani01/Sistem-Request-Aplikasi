<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    public function index(){
        
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        else{
            return view('admin.auth.login');
        }

    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('login');
        }
    }

    public function proseslogin(Request $request)
    {  
        $data = [
            'namecode' => $request->input('namecode'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect()->route('dashboard');
        }
        
        return back()->with('loginError', 'Periksa kembali namecode dan password anda');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
