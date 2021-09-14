@extends('users.layout')
@section('content')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('register') }}" >Add</a>
</span>
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>NIK/NIS</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Class</th>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->kode }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->class_name }}</td>
            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
            <form action="{{ route('users.destroy', $user->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </td>
            </tr>
@endforeach
</tbody>
</table>
{!! $users->links() !!}
</div> 
</div>
@endsection  