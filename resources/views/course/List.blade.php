@extends('course.layout')
@section('content')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('courses.create') }}" >Add</a>
</span>
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>KKM</th>
                    <th>Tahun Ajaran</th>
                    <th>Komponen</th>
                    <th>Guru</th>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
            <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->level }}</td>
            <td>{{ $course->kkm }}</td>
            <td>{{ $course->tahun_ajaran }}</td>
            <td>
                <ul>
                    <li><a href="{{ Storage::url('uploads/'.$course->file1) }}" target="_blank">{{ $course->komponen1 }}</a></li>
                    <li><a href="{{ Storage::url('uploads/'.$course->file2) }}" target="_blank">{{ $course->komponen2 }}</a></li>
                    <li><a href="{{ Storage::url('uploads/'.$course->file3) }}" target="_blank">{{ $course->komponen3 }}</a></li>
                    <li><a href="{{ Storage::url('uploads/'.$course->file4) }}" target="_blank">{{ $course->komponen4 }}</a></li>
                    <li> <a href="{{ Storage::url('uploads/'.$course->file5) }}" target="_blank">{{ $course->komponen5 }}</a></li> 
            </td>
            <td>
                <ul>
                    <li>{{ $course->kode_guru.' - '.$course->nama_guru }}</li>
                    <li>{{ $course->kode_guru2.' - '.$course->nama_guru2 }}</li>
                    <li>{{ $course->kode_guru3.' - '.$course->nama_guru3 }}</li>
                    <li>{{ $course->kode_guru4.' - '.$course->nama_guru4 }}</li>
                    <li>{{ $course->kode_guru5.' - '.$course->nama_guru5 }}</li>
                </ul></td>
            <td>
                <a href="{{ route('courses.edit',$course->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <form action="{{ route('courses.destroy', $course->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </td>
            </tr>
@endforeach
</tbody>
</table>
{!! $courses->links() !!}
</div> 
</div>
@endsection  