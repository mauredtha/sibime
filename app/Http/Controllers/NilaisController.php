<?php

namespace App\Http\Controllers;
use App\Nilais;
use App\Classes;
use App\Courses;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Redirect;

class NilaisController extends Controller
{
    
    public function listNilai()
    {
        $data['grades'] = Nilais::where(['id_class' => Auth::user()->class_id, 'kode_siswa' => Auth::user()->kode])->get();

        foreach ($data['grades'] as $key => $value) {
            $data['grades'][$key]['nama_kelas'] = Classes::where('id', $value->id_class)->value('name');
            $data['grades'][$key]['mata_pelajaran'] = Courses::where('id', $value->id_course)->value('name');
            $data['grades'][$key]['nama_guru'] = User::where('kode', $value->kode_guru)->value('name');
        }
        return view('nilai.daftar', $data);
    }
}