<?php

namespace App\Http\Controllers;
use App\BukuKerja;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class BukuKerjasController extends Controller
{
    
    public function index()
    {
        $data['workbooks'] = BukuKerja::orderBy('id','desc')->paginate(10);
        return view('workbook.list',$data);
    }

 
    public function create()
    {
        return view('workbook.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'name' => 'required',
            // 'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'tahun_ajaran' => 'required',
            ]);

        if($request->file('file')){
            $name = date('YmdHis').'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file->getClientOriginalName();
            $insert['file'] = $fileName;
        }

        $insert['kategori'] = $request->get('kategori');
        $insert['name'] = $request->get('name');
        $insert['tahun_ajaran'] = $request->get('tahun_ajaran');
        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');
       
        // BukuKerja::insert(request()->except(['_token']));
        BukuKerja::insert($insert);
        return Redirect::to('workbooks')->with('success','Greate! WorkBook created successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['workbook_info'] = BukuKerja::where($where)->first();
        return view('workbook.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $update = $request->except('_method','_token','submit');
        // dd($request);
        $request->validate([
            'kategori' => 'required',
            'name' => 'required',
            'tahun_ajaran' => 'required',
            ]);
        $update = ['kategori' => $request->kategori, 'name' => $request->name, 'tahun_ajaran' => $request->tahun_ajaran];

        if($request->file('file')){
            $name = date('YmdHis').'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->file->getClientOriginalName();
            $update['file'] = $fileName;
        }

        $update['kategori'] = $request->get('kategori');
        $update['name'] = $request->get('name');
        $update['tahun_ajaran'] = $request->get('tahun_ajaran');
        $upate['updated_at'] = date('Y-m-d H:i:s');

        BukuKerja::where('id',$id)->update($update);
        return Redirect::to('workbooks')->with('success','Great! Workbook updated successfully');
    }

    public function destroy($id)
    {
        BukuKerja::where('id',$id)->delete();
        return Redirect::to('workbooks')->with('success','Workbooks deleted successfully');
    }

    public function buku_kerja_satu(){
        
        $data['workbooks'] = BukuKerja::where('kategori','Buku Kerja I')->orderBy('id','desc')->get();
        return view('workbook.satu',$data);
    }

    public function buku_kerja_dua(){
        
        $data['workbooks'] = BukuKerja::where('kategori','Buku Kerja II')->orderBy('id','desc')->get();
        return view('workbook.dua',$data);
    }

    public function buku_kerja_tiga(){
        
        $data['workbooks'] = BukuKerja::where('kategori','Buku Kerja III')->orderBy('id','desc')->get();
        return view('workbook.tiga',$data);
    }

    public function buku_kerja_empat(){
        
        $data['workbooks'] = BukuKerja::where('kategori','Buku Kerja IV')->orderBy('id','desc')->get();
        return view('workbook.empat',$data);
    }
}
