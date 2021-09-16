<?php

namespace App\Http\Controllers;
use App\Materis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Redirect;

class MaterisController extends Controller
{
    
    public function listMateri($id)
    {
        $data['subjects'] = Materis::where(['id_class' => Auth::user()->class_id, 'ic_course' => $id])->get();
        return view('materi.daftar',$data);
    }
}