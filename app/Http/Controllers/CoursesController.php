<?php

namespace App\Http\Controllers;
use App\Courses;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Redirect;

class CoursesController extends Controller
{
    
    public function index()
    {
        $data['courses'] = Courses::orderBy('id','desc')->paginate(10);
        return view('course.list',$data);
    }

    public function create()
    {
        $teachers = User::where('role','Guru')->get();

        // dd($teachers[0]->kode);

        $compactData=array('teachers');
        return View::make('course.create', compact($compactData));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'kkm' => 'required',
            'kode_guru' => 'required',
            'tahun_ajaran' => 'required',
            ]);

        $insert['name'] = $request->get('name');
        $insert['level'] = $request->get('level');
        $insert['kkm'] = $request->get('kkm');
        $insert['kode_guru'] = $request->get('kode_guru');
        $teacher = User::where('kode',$insert['kode_guru'])->value('name');
        $insert['nama_guru'] =$teacher;
        $insert['tahun_ajaran'] = $request->get('tahun_ajaran');
        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');

        //dd($insert);
       
        Courses::insert($insert);
        return Redirect::to('courses')->with('success','Greate! Courses created successfully.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['course_info'] = Courses::where($where)->first();

        $teachers = User::where('role','Guru')->get();

        $compactData=array('teachers', 'data');
        return View::make('course.edit', compact($compactData));
        //return view('courses.edit', $data);
    }

    
    public function update(Request $request, $id)
    {
        $update = $request->except('_method','_token','submit');
        // dd($request);
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'kkm' => 'required',
            'kode_guru' => 'required',
            'tahun_ajaran' => 'required',
            ]);
            
        $update = ['name' => $request->name, 'level' => $request->level, 'kkm' => $request->kkm, 'kode_guru' => $request->kode_guru, 'tahun_ajaran' => $request->tahun_ajaran];

        $update['name'] = $request->get('name');
        $update['level'] = $request->get('level');
        $update['kkm'] = $request->get('kkm');
        $update['kode_guru'] = $request->get('kode_guru');
        $teacher = User::where('kode',$update['kode_guru'])->value('name');
        $update['nama_guru'] =$teacher;
        $update['tahun_ajaran'] = $request->get('tahun_ajaran');
        $upate['updated_at'] = date('Y-m-d H:i:s');

        Courses::where('id',$id)->update($update);
        return Redirect::to('courses')->with('success','Great! Courses updated successfully');
    }

    
    public function destroy($id)
    {
        Courses::where('id',$id)->delete();
        return Redirect::to('courses')->with('success','Courses deleted successfully');
    }
}
