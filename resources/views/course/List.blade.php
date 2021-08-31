@extends('course.layout')
@section('content')
<a href="{{ route('courses.create') }}" class="btn btn-success mb-2">Add</a> 
<br>
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
                    <th>Komponen 1</th>
                    <th>Komponen 2</th>
                    <th>Komponen 3</th>
                    <th>Komponen 4</th>
                    <th>Komponen 5</th>
                    <th>Guru 1</th>
                    <th>Guru 2</th>
                    <th>Guru 3</th>
                    <th>Guru 4</th>
                    <th>Guru 5</th>
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
            <td><a href="{{ Storage::url('uploads/'.$course->file1) }}" target="_blank">{{ $course->komponen1 }}</a></td>
            <td><a href="{{ Storage::url('uploads/'.$course->file2) }}" target="_blank">{{ $course->komponen2 }}</a></td>
            <td><a href="{{ Storage::url('uploads/'.$course->file3) }}" target="_blank">{{ $course->komponen3 }}</a></td>
            <td><a href="{{ Storage::url('uploads/'.$course->file4) }}" target="_blank">{{ $course->komponen4 }}</a></td>
            <td><a href="{{ Storage::url('uploads/'.$course->file5) }}" target="_blank">{{ $course->komponen5 }}</a></td>
            <td>{{ $course->kode_guru.' - '.$course->nama_guru }}</td>
            <td>{{ $course->kode_guru2.' - '.$course->nama_guru2 }}</td>
            <td>{{ $course->kode_guru3.' - '.$course->nama_guru3 }}</td>
            <td>{{ $course->kode_guru4.' - '.$course->nama_guru4 }}</td>
            <td>{{ $course->kode_guru5.' - '.$course->nama_guru5 }}</td>
            <!-- <td>{{ date('Y-m-d', strtotime($course->created_at)) }}</td> -->
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