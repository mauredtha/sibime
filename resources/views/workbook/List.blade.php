@extends('workbook.layout')
@section('content')
<a href="{{ route('workbooks.create') }}" class="btn btn-success mb-2">Add</a> 
<br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Product Code</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($workbooks as $workbook)
            <tr>
            <td>{{ $workbook->id }}</td>
            <td>{{ $workbook->kategori }}</td>
            <td>{{ $workbook->name }}</td>
            <td>{{ $workbook->file }}</td>
            <td>{{ $workbook->tahun_ajaran }}</td>
            <td>{{ date('Y-m-d', strtotime($workbook->created_at)) }}</td>
            <td><a href="{{ route('workbooks.edit',$workbook->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
            <form action="{{ route('workbooks.destroy', $workbook->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            </td>
            </tr>
@endforeach
</tbody>
</table>
{!! $workbooks->links() !!}
</div> 
</div>
@endsection  