@extends('nilai.view')
@section('content')
<form action="{{ route('grades.store') }}" method="POST" name="add_classes" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama Kelas</strong>
                <input type="hidden" name="id_class" value={{$class[0]->id}}>
                <input type="text" name="kelas" class="form-control" value={{$class[0]->name}} readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" name="tahun_ajar" class="form-control" value={{$class[0]->tahun_ajaran}} readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Mata Pelajaran</strong>
                <select name="id_course" id="id_course" class="form-control">
                    @foreach($courses as $key => $val)
                    <option value="{{$val->id}}">{{$val->level.' - '.$val->name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('id_course') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama Siswa</strong>
                <select name="kode_siswa" id="kode_siswa" class="form-control">
                    @foreach($siswa as $key => $val)
                    <option value="{{$val->kode}}">{{$val->kode.' - '.$val->name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('kode_siswa') }}</span>
            </div>
        </div> 
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nilai</strong>
                <input type="text" class="form-control" name="nilai" placeholder="Enter Nilai"></textarea>
                <span class="text-danger">{{ $errors->first('nilai') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Dokumen</strong>
                <input type="file" name="doc" class="form-control" placeholder="">
                <span class="text-danger">{{ $errors->first('doc') }}</span>
            </div>
        </div>   

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection