@extends('classes.layout')
@section('content')
<br>
<form action="{{ route('classes.update', $class_info->id) }}" method="POST" name="update_workbook" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
<!-- @method('PUT') -->
<!-- @csrf  -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Level</strong>
                <input type="text" name="level" class="form-control" placeholder="Enter Level" value="{{ $class_info->level }}">
                @if(!$class_info->level)
                <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama" value="{{ $class_info->name }}">
                @if(!$class_info->name)
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Enter Description" value="{{ $class_info->tahun_ajaran }}"></textarea>
                @if(!$class_info->tahun_ajaran)
                <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection