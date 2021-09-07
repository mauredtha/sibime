@extends('workbook.layout')
@section('content')
<br>
<form action="{{ route('workbooks.store') }}" method="POST" name="add_workbook" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <input type="text" name="kategori" class="form-control" placeholder="Enter Kategori">
                <span class="text-danger">{{ $errors->first('kategori') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Enter Tahun Ajaran"></textarea>
                <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
            </div>
        </div>    
        <div class="col-md-12">
            <div class="form-group">
                <strong>File</strong>
                <input type="file" name="file" class="form-control" placeholder="">
                <span class="text-danger">{{ $errors->first('file') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection