@extends('workbook.layout')
@section('content')
<br>
<form action="{{ route('workbooks.update', $workbook_info->id) }}" method="POST" name="update_workbook" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
<!-- @method('PUT') -->
<!-- @csrf  -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <input type="text" name="kategori" class="form-control" placeholder="Enter Kategori" value="{{ $workbook_info->kategori }}">
                @if(!$workbook_info->kategori)
                <span class="text-danger">{{ $errors->first('kategori') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama" value="{{ $workbook_info->name }}">
                @if(!$workbook_info->name)
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Enter Description" value="{{ $workbook_info->tahun_ajaran }}"></textarea>
                @if(!$workbook_info->tahun_ajaran)
                <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>File</strong>
                @if($workbook_info->file)
                <a href="{{ Storage::url('uploads/'.$workbook_info->file) }}" target="_blank"></a>
                @endif
                <input type="file" name="file" class="form-control" placeholder="" value="{{ $workbook_info->file }}">
                <!-- <span class="text-danger">{{ $errors->first('file') }}</span> -->
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection