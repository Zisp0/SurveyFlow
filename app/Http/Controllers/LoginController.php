<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(){
        return view('login', ['error' => false]);
    }

    public function login(Request $request){
        $user = $request->input('user');
        switch($user){
            case 'user':
                return view('user');
            case 'admin':
                return view('admin');
            default:
                return view('login', ['error' => true]);
        }
    }
}
