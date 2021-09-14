<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use Redirect;

use App\BukuKerja;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'Admin'){
            return view('admin');
        }elseif (Auth::user()->role == 'Guru') {
            $buku_kerja_i = BukuKerja::where('kategori','Buku Kerja I')->count();
            $buku_kerja_ii = BukuKerja::where('kategori','Buku Kerja II')->count();
            $buku_kerja_iii = BukuKerja::where('kategori','Buku Kerja III')->count();
            $buku_kerja_iv = BukuKerja::where('kategori','Buku Kerja IV')->count();

            $compactData=array('buku_kerja_i', 'buku_kerja_ii', 'buku_kerja_iii', 'buku_kerja_iv');
            return View::make('teacher', compact($compactData));
        }else {
            return view('home');
        }
        
    }
}
