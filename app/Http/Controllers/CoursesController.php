<?php

namespace App\Http\Controllers;
use App\Courses;
use App\CourseDetail;
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

        //ini_set('max_execution_time', 300);
        //set_time_limit(600);
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'kkm' => 'required',
            'tahun_ajaran' => 'required',
            'kode_guru' => 'required',
            'kode_guru2' => 'required',
            'kode_guru3' => 'required',
            'kode_guru4' => 'required',
            'kode_guru5' => 'required',
            'komponen1' => 'required',
            'file1' => 'required',
            'komponen2' => 'required',
            'file2' => 'required',
            'komponen3' => 'required',
            'file3' => 'required',
            'komponen4' => 'required',
            'file4' => 'required',
            'komponen5' => 'required',
            'file5' => 'required',
            ]);

        $insert['name'] = $request->get('name');
        $insert['level'] = $request->get('level');
        $insert['kkm'] = $request->get('kkm');
        $insert['tahun_ajaran'] = $request->get('tahun_ajaran');

        // dd($request->file->getClientOriginalName());
        for($i=1; $i<=5; $i++){
            $sign = 'file'.$i;
            //dd($request->file($sign));
            $insert['komponen'.$i] = $request->get('komponen'.$i);
            if($request->file($sign)){
                $name = date('YmdHis').'_'.$request->$sign->getClientOriginalName();
                $filePath = $request->file($sign)->storeAs('uploads', $name, 'public');
                $fileName = date('YmdHis').'_'.$request->$sign->getClientOriginalName();
                $insert[$sign] = $fileName;
            }
        }

        //dd($insert);
        
        $insert['kode_guru'] = $request->get('kode_guru');
        $teacher = User::where('kode',$insert['kode_guru'])->value('name');
        $insert['nama_guru'] =$teacher;


        // for($a=2; $a<=5; $i++){
        //     $insert['kode_guru'.$a] = $request->get('kode_guru'.$a);
        //     $teacher.$a = User::where('kode',$insert['kode_guru'.$a])->value('name');
        //     $label = 'nama_guru'.$a;
        //     $insert[$label] = $teacher.$a;
        //     dd($insert);
        // }

        $insert['kode_guru2'] = $request->get('kode_guru2');
        $teacher2 = User::where('kode',$insert['kode_guru2'])->value('name');
        $insert['nama_guru2'] =$teacher2;

        $insert['kode_guru3'] = $request->get('kode_guru3');
        $teacher3 = User::where('kode',$insert['kode_guru3'])->value('name');
        $insert['nama_guru3'] =$teacher3;

        $insert['kode_guru4'] = $request->get('kode_guru4');
        $teacher4 = User::where('kode',$insert['kode_guru4'])->value('name');
        $insert['nama_guru4'] =$teacher4;

        $insert['kode_guru5'] = $request->get('kode_guru5');
        $teacher5 = User::where('kode',$insert['kode_guru5'])->value('name');
        $insert['nama_guru5'] =$teacher5;
        
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

        //dd($teachers);exit;

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
            'tahun_ajaran' => 'required',
            'kode_guru' => 'required',
            'kode_guru2' => 'required',
            'kode_guru3' => 'required',
            'kode_guru4' => 'required',
            'kode_guru5' => 'required',
            'komponen1' => 'required',
            'file1' => 'required',
            'komponen2' => 'required',
            'file2' => 'required',
            'komponen3' => 'required',
            'file3' => 'required',
            'komponen4' => 'required',
            'file4' => 'required',
            'komponen5' => 'required',
            'file5' => 'required',
            ]);
            
        $update = ['name' => $request->name, 'level' => $request->level, 'kkm' => $request->kkm, 'kode_guru' => $request->kode_guru, 'tahun_ajaran' => $request->tahun_ajaran, 'kode_guru2' => $request->kode_guru2, 'kode_guru3' => $request->kode_guru3, 'kode_guru4' => $request->kode_guru4, 'kode_guru5' => $request->kode_guru5, 'komponen1' => $request->komponen1, 'file1' => $request->file1, 'komponen2' => $request->komponen2, 'file2' => $request->file2, 'komponen3' => $request->komponen3, 'file3' => $request->file3, 'komponen4' => $request->komponen4, 'file4' => $request->file4, 'komponen5' => $request->komponen5, 'file5' => $request->file5];

        $update['name'] = $request->get('name');
        $update['level'] = $request->get('level');
        $update['kkm'] = $request->get('kkm');
        $update['tahun_ajaran'] = $request->get('tahun_ajaran');

        for($i=1; $i<=5; $i++){
            $sign = 'file'.$i;
            $update['komponen'.$i] = $request->get('komponen'.$i);
            if($request->file($sign)){
                $name = date('YmdHis').'_'.$request->$sign->getClientOriginalName();
                $filePath = $request->file($sign)->storeAs('uploads', $name, 'public');
                $fileName = date('YmdHis').'_'.$request->$sign->getClientOriginalName();
                $update[$sign] = $fileName;
            }
        }
        
        $update['kode_guru'] = $request->get('kode_guru');
        $teacher = User::where('kode',$update['kode_guru'])->value('name');
        $update['nama_guru'] =$teacher;

        $update['kode_guru2'] = $request->get('kode_guru2');
        $teacher2 = User::where('kode',$update['kode_guru2'])->value('name');
        $update['nama_guru2'] =$teacher2;

        $update['kode_guru3'] = $request->get('kode_guru3');
        $teacher3 = User::where('kode',$update['kode_guru3'])->value('name');
        $update['nama_guru3'] =$teacher3;

        $update['kode_guru4'] = $request->get('kode_guru4');
        $teacher4 = User::where('kode',$update['kode_guru4'])->value('name');
        $update['nama_guru4'] =$teacher4;

        $update['kode_guru5'] = $request->get('kode_guru5');
        $teacher5 = User::where('kode',$update['kode_guru5'])->value('name');
        $update['nama_guru5'] =$teacher5;
       
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
