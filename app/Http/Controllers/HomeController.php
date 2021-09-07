<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'Admin'){
            return view('admin');
        }elseif (Auth::user()->role == 'Guru') {
            return view('teacher');
        }else {
            return view('home');
        }
        
    }
}
