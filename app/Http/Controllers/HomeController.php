<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use Redirect;

use App\BukuKerja;
use App\Courses;
use App\Classes;

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

            $materi = BukuKerja::where('kategori','Buku Kerja I')->count();
            $latihan = BukuKerja::where('kategori','Buku Kerja II')->count();
            $uh = BukuKerja::where('kategori','Buku Kerja III')->count();
            $remed = BukuKerja::where('kategori','Buku Kerja IV')->count();

            $class = Classes::where('id',Auth::user()->class_id)->get();
            
            $conds = ['level' => $class[0]->level, 'tahun_ajaran' => $class[0]->tahun_ajaran];

            $data['courses'] = Courses::where($conds)->get();

            //dd($data['courses']);

            $compactData=array('materi', 'latihan', 'uh', 'remed', 'data');
            return View::make('siswa', compact($compactData));
        }
        
    }
}
