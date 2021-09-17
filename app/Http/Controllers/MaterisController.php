<?php

namespace App\Http\Controllers;
use App\Materis;
use App\Courses;
use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Redirect;

class MaterisController extends Controller
{
    
    public function listMateri($id)
    {
        if(Auth::user()->role == 'Siswa'){
            $data['subjects'] = Materis::where(['id_class' => Auth::user()->class_id, 'ic_course' => $id])->get();
        }else {
            
            $class_level = Classes::where('id', '=', $id)->value('level');

            $data['subjects'] = Courses::where('kode_guru', '=', Auth::user()->kode)->orWhere('kode_guru2', '=', Auth::user()->kode)->orWhere('kode_guru3', '=', Auth::user()->kode)->orWhere('kode_guru4', '=', Auth::user()->kode)->orWhere('kode_guru5', '=', Auth::user()->kode)->get();

            foreach ($data['subjects'] as $key => $value) {
                $data['subjects'][$key]['ListMateri'] = Materis::where(['id_class' => $id, 'ic_course' => $value->id])->get();
            }

            //dd($data['subjects']);

        }

        $compactData=array('data', 'id');
        return View::make('materi.daftar', compact($compactData));

        //return view('materi.daftar',$data);
        
    }
}