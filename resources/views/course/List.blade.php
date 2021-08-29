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
                    <th>Guru</th>
                    <th>Tahun Ajaran</th>
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
            <td>{{ $course->kode_guru }}</td>
            <td>{{ $course->nama_guru }}</td>
            <td>{{ $course->tahun_ajaran }}</td>
            <td>{{ date('Y-m-d', strtotime($course->created_at)) }}</td>
            <td><a href="{{ route('courses.edit',$course->id)}}" class="btn btn-primary">Edit</a></td>
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