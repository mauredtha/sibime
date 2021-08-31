@extends('course.layout')
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Courses</a></h2>
<br>
<form action="{{ route('courses.update', $data['course_info']->id) }}" method="POST" name="update_course" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
<!-- @method('PUT') -->
<!-- @csrf  -->
    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama" value="{{ $data['course_info']->name }}">
                @if(!$data['course_info']->name)
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Level</strong>
                <input type="text" name="level" class="form-control" placeholder="Enter Level" value="{{ $data['course_info']->level }}">
                @if(!$data['course_info']->level)
                <span class="text-danger">{{ $errors->first('level') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>KKM</strong>
                <input type="text" name="kkm" class="form-control" placeholder="Enter KKM" value="{{ $data['course_info']->kkm }}">
                @if(!$data['course_info']->kkm)
                <span class="text-danger">{{ $errors->first('kkm') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Enter Tahun Ajaran" value="{{ $data['course_info']->tahun_ajaran }}"></textarea>
                @if(!$data['course_info']->tahun_ajaran)
                <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
                @endif
            </div>
        </div>

        <?php for($i=1; $i <= 5; $i++) {?>
        <div class="col-md-12">
            <div class="form-group">
            <strong>Komponen {{$i}}</strong>
                <input type="text" class="form-control" name="komponen{{$i}}" placeholder="Enter Komponen" value="{{ $data['course_info']->komponen.$i }}"></textarea>
                @if(!$data['course_info']->komponen.$i)
                <span class="text-danger">{{ $errors->first('komponen'.$i) }}</span>
                @endif
            </div>
        </div>   
        <div class="col-md-12">
            <div class="form-group">
            <strong>File {{$i}}</strong>
                @if($data['course_info']->file.$i)
                <a href="{{ Storage::url('uploads/'.$data['course_info']->file.$i) }}" target="_blank"></a>
                @endif
                <input type="file" name="file{{$i}}" class="form-control" placeholder="" value="{{ $data['course_info']->file.$i }}">
            </div>
        </div> 
        <?php } ?>

        <div class="col-md-12">
            <div class="form-group">
                <strong>Guru</strong>
                <select name="kode_guru" class="form-control">
                    
                <?php foreach ($teachers as $key => $value) { ?>
                    <option value="{{ $value->kode }}" {{ $value->kode == $data['course_info']->kode_guru ? 'selected' : '' }}>{{ $value->name }}</option>
                <?php } ?>
                </select>
                @if(!$data['course_info']->kode_guru)
                <span class="text-danger">{{ $errors->first('kode_guru') }}</span>
                @endif
            </div>
        </div>

        <?php for($i=2; $i <= 5; $i++) {?>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Guru {{$i}}</strong>
                <select name="kode_guru{{$i}}" class="form-control">
                    <?php foreach ($teachers as $key => $value) { ?>
                        <option value="{{ $value->kode }}" {{ $value->kode == $data['course_info']->kode_guru.$i ? 'selected' : '' }}>{{ $value->name }}</option>
                    <?php } ?>
                </select>
                @if(!$data['course_info']->kode_guru.$i)
                <span class="text-danger">{{ $errors->first('kode_guru'.$i) }}</span>
                @endif
            </div>
        </div>
        <?php } ?>
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection