<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use Redirect;

use App\BukuKerja;
use App\Courses;
use App\Classes;
use App\Materis;
use App\Nilais;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'Admin'){
            $kelas = Classes::count();
            $mapel = Courses::count();
            $teacher = User::where('role', '=', 'Guru')->count();
            $siswa = User::where('role', '=', 'Siswa')->count();
            $workbook = BukuKerja::count();

            return view('admin', compact('kelas','mapel','teacher','siswa','workbook'));
        }elseif (Auth::user()->role == 'Guru') {
            $buku_kerja_i = BukuKerja::where('kategori','Buku Kerja I')->count();
            $buku_kerja_ii = BukuKerja::where('kategori','Buku Kerja II')->count();
            $buku_kerja_iii = BukuKerja::where('kategori','Buku Kerja III')->count();
            $buku_kerja_iv = BukuKerja::where('kategori','Buku Kerja IV')->count();

            $compactData=array('buku_kerja_i', 'buku_kerja_ii', 'buku_kerja_iii', 'buku_kerja_iv');
            return View::make('teacher', compact($compactData));
        }else {

            $materi = Materis::where('id_class', Auth::user()->class_id)->whereDate('deadline_materi', '>=', date('Y-m-d'))->whereNotNull('materi')->count();
            $latihan = Materis::where(['id_class' => Auth::user()->class_id])->whereDate('deadline_latihan', '>=', date('Y-m-d'))->whereNotNull('latihan')->count();
            $uh = Materis::where(['id_class' => Auth::user()->class_id])->whereDate('deadline_uh', '>=', date('Y-m-d'))->whereNotNull('ulangan_harian')->count();
            $remed = Materis::where(['id_class' => Auth::user()->class_id])->whereDate('deadline_remidi', '>=', date('Y-m-d'))->whereNotNull('remidial')->count();

            $class = Classes::where('id',Auth::user()->class_id)->get();
            
            $conds = ['level' => $class[0]->level, 'tahun_ajaran' => $class[0]->tahun_ajaran];

            $data['courses'] = Courses::where($conds)->get();

            //dd($data['courses']);

            $compactData=array('materi', 'latihan', 'uh', 'remed', 'data', 'class');
            return View::make('siswa', compact($compactData));
        }
        
    }
}
