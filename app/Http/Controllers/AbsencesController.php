<?php

namespace App\Http\Controllers;
use App\Materis;
use App\Classes;
use App\Courses;
use App\User;
use App\Absences;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Redirect;

class AbsencesController extends Controller
{
    
    public function absensi()
    {
        $class = Classes::where('id',Auth::user()->class_id)->get();
            
        $conds = ['level' => $class[0]->level, 'tahun_ajaran' => $class[0]->tahun_ajaran];

        $data['courses'] = Courses::where($conds)->get();

        return view('absence.absensi', $data);
    }

    public function absensi_detail($id){
        //id = 6

        $courses = Courses::where('id',$id)->get();

        $data['absences'] = Absences::where('kode_guru', '=', $courses[0]->kode_guru)->orWhere('kode_guru', '=', $courses[0]->kode_guru2)->orWhere('kode_guru', '=', $courses[0]->kode_guru3)->orWhere('kode_guru', '=', $courses[0]->kode_guru4)->orWhere('kode_guru', '=', $courses[0]->kode_guru5)->get();
        
        return view('absence.detail', $data);
    }
}