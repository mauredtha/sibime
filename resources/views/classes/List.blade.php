@extends('classes.layout')
@section('content')
@if(Auth::user()->role == 'Admin')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('classes.create') }}" >Add</a>
</span>
@endif
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Level</th>
                    <th>Name</th>
                    <th>Tahun Ajaran</th>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($classes as $class)
            <tr>
            <td>{{ $class->id }}</td>
            <td>{{ $class->level }}</td>
            <td>{{ $class->name }}</td>
            <td>{{ $class->tahun_ajaran }}</td>

            @if(Auth::user()->role == 'Admin')
            <td><a href="{{ route('classes.edit',$class->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
            <form action="{{ route('classes.destroy', $class->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </td>
            @else
            <td><a href="{{ route('classes.edit',$class->id)}}" class="btn btn-primary">Absensi</a></td>
            <td><a href="{{ route('list_materi',$class->id)}}" class="btn btn-primary">Materi</a></td>
            <td><a href="{{ route('classes.edit',$class->id)}}" class="btn btn-primary">Nilai</a></td>
            @endif
            </tr>
@endforeach
</tbody>
</table>
{!! $classes->links() !!}
</div> 
</div>
@endsection  