<?php

namespace App\Http\Controllers;
use App\BukuKerja;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class BukuKerjasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['workbooks'] = BukuKerja::orderBy('id','desc')->paginate(10);
        return view('workbook.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $name = time().'_'.$request->file->getClientOriginalName();
            // dd($name);
            $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
            $fileName = time().'_'.$request->file->getClientOriginalName();
            //dd($fileName);
            $insert['file'] = $fileName;
            //'/storage/'.$filePath;

            //dd($insert['file']);
        }

        // if ($files = $request->file('file')) {
        //     $destinationPath = 'public/files/'; // upload path
        //     $fileName = date('YmdHis') . "." . $files->getClientOriginalName();
        //     $files->move($destinationPath, $fileName);
        //     $insert['file'] = "$fileName";
        // }
        $insert['kategori'] = $request->get('kategori');
        $insert['name'] = $request->get('name');
        $insert['tahun_ajaran'] = $request->get('tahun_ajaran');
        // dd($insert);
        // dd(request()->except(['_token']));
        // BukuKerja::insert(request()->except(['_token']));
        BukuKerja::insert($insert);
        return Redirect::to('workbooks')->with('success','Greate! WorkBook created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['workbook_info'] = BukuKerja::where($where)->first();
        return view('workbook.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'name' => 'required',
            'tahun_ajaran' => 'required',
            ]);
        $update = ['kategori' => $request->title, 'name' => $request->description, 'tahun_ajaran' => $request->tahun_ajaran];
        if ($files = $request->file()) {
            $destinationPath = 'public/files/'; // upload path
            $fileName = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $fileName);
            $update['file'] = "$fileName";
        }
        $update['kategori'] = $request->get('kategori');
        $update['name'] = $request->get('name');
        $update['tahun_ajaran'] = $request->get('tahun_ajaran');
        BukuKerja::where('id',$id)->update($update);
        return Redirect::to('workbooks')->with('success','Great! Workbook updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BukuKerja::where('id',$id)->delete();
        return Redirect::to('products')->with('success','Product deleted successfully');
    }
}
