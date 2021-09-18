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

    public function index($id)
    {
        $data['grades'] = Nilais::where(['id_class' => $id, 'kode_guru' => Auth::user()->kode])->orderBy('nama','asc')->paginate(10);

        foreach ($data['grades'] as $key => $value) {
            $data['grades'][$key]['nama_kelas'] = Classes::where('id', $value->id_class)->value('name');
            $data['grades'][$key]['mata_pelajaran'] = Courses::where('id', $value->id_course)->value('name');
        }

        return view('nilai.list',compact('data','id'));
    }

    public function create($id)
    {
        $siswa = User::where(['role'=>'Siswa','class_id'=>$id])->get();
        $class = Classes::where('id', '=', $id)->get();
        $courses = Courses::where(['level' => $class[0]->level,'kode_guru'=> Auth::user()->kode])->orWhere('kode_guru2', '=', Auth::user()->kode)->orWhere('kode_guru3', '=', Auth::user()->kode)->orWhere('kode_guru4', '=', Auth::user()->kode)->orWhere('kode_guru5', '=', Auth::user()->kode)->get();

        return view('nilai.create', compact('class','courses','siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_course' => 'required',
            'kode_siswa' => 'required',
            'nilai' => 'required',
            'doc' => 'mimes:csv,txt,xlx,xls,pdf|max:2048',
        ]);

        if($request->file('doc')){
            $name = date('YmdHis').'_'.$request->file('doc')->getClientOriginalName();
            $filePath = $request->file('doc')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('doc')->getClientOriginalName();
            $insert['doc'] = $fileName;
        }

        $insert['id_class'] = $request->get('id_class');
        $insert['id_course'] = $request->get('id_course');
        $insert['kode_siswa'] = $request->get('kode_siswa');
        $insert['nama'] = User::where(['kode'=>$request->get('kode_siswa')])->value('name');
        $insert['kode_guru'] = Auth::user()->kode;
        $insert['nilai'] = $request->get('nilai');
        $insert['tahun_ajar'] = $request->get('tahun_ajar');
        

        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');
       
        Nilais::insert($insert);
        return Redirect::route('list_nilai_class', $request->get('id_class'))->with(['success'=>'Greate! Materi created successfully.']);

    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $nilai = Nilais::where($where)->first();
        $class = Classes::where('id', '=', $nilai->id_class)->get();
        // dd($class);
        $siswa = User::where(['role'=>'Siswa','class_id'=>$class[0]->id])->get();
        $courses = Courses::where(['level' => $class[0]->level,'kode_guru'=> Auth::user()->kode])->orWhere('kode_guru2', '=', Auth::user()->kode)->orWhere('kode_guru3', '=', Auth::user()->kode)->orWhere('kode_guru4', '=', Auth::user()->kode)->orWhere('kode_guru5', '=', Auth::user()->kode)->get();
        return view('nilai.edit', compact('nilai', 'class', 'courses', 'siswa'));
    }

    
    public function update(Request $request, $id)
    {
        $update = $request->except('_method','_token','submit','kelas');
        // dd($request);
        
        if($request->file('doc')){
            $name = date('YmdHis').'_'.$request->file('doc')->getClientOriginalName();
            $filePath = $request->file('doc')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file('doc')->getClientOriginalName();
            $update['doc'] = $fileName;
        }

        $update['id_class'] = $request->get('id_class');
        $update['id_course'] = $request->get('id_course');
        $update['kode_siswa'] = $request->get('kode_siswa');
        $update['nama'] = User::where(['kode'=>$request->get('kode_siswa')])->value('name');
        $update['kode_guru'] = Auth::user()->kode;
        $update['nilai'] = $request->get('nilai');
        $update['tahun_ajar'] = $request->get('tahun_ajar');
        
        $update['updated_at'] = date('Y-m-d H:i:s');

        Nilais::where('id',$id)->update($update);
        return Redirect::route('list_nilai_class', $request->get('id_class'))->with(['success'=>'Greate! Nilai edit successfully.']);
    }

    
    public function destroy($id)
    {
        Nilais::where('id',$id)->delete();
        return Redirect::to('classes')->with('success','Nilai deleted successfully');
    }

}