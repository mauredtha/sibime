@extends('course.layout')
@section('content')

<div class="panel-heading">
Absensi Kelas {{$class_name[0]->name}} / Tahun Ajaran {{$class_name[0]->tahun_ajaran}}
</div>
<br><br>
<form action="{{ route('absences.store') }}" method="POST" name="add_absences" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row">
    <div class="col-md-12">
    <input class="form-control " id="data_siswa" name ="data_siswa" type="hidden" value="{{$datas}}" >
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Kode Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Kehadiran</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $user)
            <tr>
            <td><input class="form-control" type="hidden" id="kode_siswa" name="kode_siswa[]" value="{{ $user->kode }}" readonly/>{{ $user->kode }}</td>
            <td><input class="form-control" type="hidden" id="name" name="name[]" value="{{ $user->name }}" readonly/>{{ $user->name }}</td>
            <td><input type="checkbox" id="status_kehadiran" name="status_kehadiran[]"/></td>
            </tr>
            @endforeach
    </tbody>
    </table>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" >Submit</button>
        </div>
    </div>
</form>
@endsection