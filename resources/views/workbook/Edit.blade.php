@extends('workbook.layout')
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Workbook</a></h2>
<br>
<form action="{{ route('workbooks.update', $workbook_info->id) }}" method="POST" name="update_workbook">
{{ csrf_field() }}
@method('PATCH')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <input type="text" name="title" class="form-control" placeholder="Enter Kategori" value="{{ $workbook_info->kategori }}">
                <span class="text-danger">{{ $errors->first('kategori') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama" value="{{ $workbook_info->name }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Enter Description" >{{ $workbook_info->tahun_ajaran }}</textarea>
                <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>File</strong>
                @if($workbook_info->file)
                <a href="{{ url('public/files/'.$workbook_info->file) }}" target="_blank">
                @endif
                <input type="text" name="file" class="form-control" placeholder="" value="{{ $workbook_info->file }}">
                <span class="text-danger">{{ $errors->first('file') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection