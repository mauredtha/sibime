@extends('absence.layout')
@section('content')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('add_absensi_class', $id) }}" >Add</a>
</span>
<div class="panel-heading">
    Absensi Kelas {{$class_name[0]->name}} / Tahun Ajaran {{$class_name[0]->tahun_ajaran}}
</div>
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kode Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data['absensi'] as $absen)
            <tr>
            <td>{{ $absen->id }}</td>
            <td>{{ $absen->kode }}</td>
            <td>{{ $absen->name }}</td>
            <td><a href="{{ route('absensi_detail',$absen->kode)}}" class="btn btn-primary">Detail</a></td>

            </tr>
@endforeach
</tbody>
</table>
{!! $data['absensi']->links() !!}
</div> 
</div>
@endsection  