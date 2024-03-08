<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function show(){
        return view('login', ['error' => false]);
    }

    public function login(Request $request){
        $user = Str::lower($request->input('user'));
        switch($user){
            case 'user':
                return redirect('/user');
            case 'admin':
                return redirect('/admin');
            default:
                return view('login', ['error' => true]);
        }
    }
}
