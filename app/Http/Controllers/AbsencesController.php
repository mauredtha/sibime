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

    public function index($id)
    {
        // $data['absensi'] = Absences::where(['id_class'=>$id, 'kode_guru'=>Auth::user()->kode])->orderBy('id','desc')->paginate(10);
        $data['absensi'] = User::where(['class_id'=>$id])->orderBy('name','asc')->paginate(10);
        $class_name = Classes::where('id', '=', $id)->get();
        return view('absence.list',compact('data','class_name','id'));

        // $absensi = Absensi::findOrFail($id_class);
        // return view('absensi.list', $absensi);
    }

    public function create($id)
    {
        $datas = User::where(['role'=>'Siswa', 'class_id'=>$id])->get();
        $class_name = Classes::where('id', '=', $id)->get();
        return view('absence.create', compact('datas','class_name'));
    }

    public function store(Request $request)
    {
        $class_id =  User::where('kode', '=', $request->input('kode_siswa')[0])->value('class_id');

        $tahun_ajar = Classes::where('id', '=', $class_id)->value('tahun_ajaran');
        $siswa= [];
        foreach ( $request->kode_siswa as $key => $value ) {
            if($request->input('status_kehadiran')[$key] == 'on'){
                $kehadiran = 1;
            }else {
                $kehadiran = 0;
            }
            $siswa[] = [
                'id_class' => $class_id,
                'kode_siswa' => $request->input('kode_siswa')[$key],
                'nama' => $request->input('name')[$key],
                'status_kehadiran' => $kehadiran,
                'tahun_ajar' => $tahun_ajar,
                'kode_guru' => Auth::user()->kode,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        //dd($siswa);
        Absences::insert($siswa);

        return Redirect::route('absensi_class', $class_id)->with(['success'=>'Greate! Absences created successfully.']);
    }
    
    public function absensi()
    {
        $class = Classes::where('id',Auth::user()->class_id)->get();
            
        $conds = ['level' => $class[0]->level, 'tahun_ajaran' => $class[0]->tahun_ajaran];

        $data['courses'] = Courses::where($conds)->get();

        return view('absence.absensi', $data);
    }

    public function absensi_detail($id){
        //id = 6

        if(Auth::user()->role == 'Siswa'){
            $courses = Courses::where('id',$id)->get();

            $data['absences'] = Absences::where(['kode_siswa' => Auth::user()->kode,'kode_guru' => $courses[0]->kode_guru])->orWhere('kode_guru', '=', $courses[0]->kode_guru2)->orWhere('kode_guru', '=', $courses[0]->kode_guru3)->orWhere('kode_guru', '=', $courses[0]->kode_guru4)->orWhere('kode_guru', '=', $courses[0]->kode_guru5)->get();
        } else {
            //Guru
            $class_id = User::where(['kode'=>$id])->value('class_id');
            $data['absences'] = Absences::where(['kode_siswa' => $id, 'id_class'=>$class_id])->get();
        }
        
        return view('absence.detail', $data);
    }
}