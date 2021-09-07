@extends('course.layout')
@section('content')
<?php
ini_set('max_execution_time', 3600);
?>
<form action="{{ route('courses.store') }}" method="POST" name="add_courses" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Level</strong>
                <input type="text" name="level" class="form-control" placeholder="Enter Level">
                <span class="text-danger">{{ $errors->first('level') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>KKM</strong>
                <input type="text" name="kkm" class="form-control" placeholder="Enter KKM">
                <span class="text-danger">{{ $errors->first('kkm') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Enter Tahun Ajaran"></textarea>
                <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
            </div>
        </div>

        <?php for($i=1; $i <= 5; $i++) {?>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Komponen {{$i}}</strong>
                <input type="text" class="form-control" name="komponen{{$i}}" placeholder="Enter Nama Komponen"></textarea>
                <span class="text-danger">{{ $errors->first('komponen'.$i) }}</span>
            </div>
        </div>   
        <div class="col-md-12">
            <div class="form-group">
                <strong>File {{$i}}</strong>
                <input type="file" name="file{{$i}}" class="form-control" placeholder="">
                <span class="text-danger">{{ $errors->first('file'.$i) }}</span>
            </div>
        </div> 
        <?php } ?>

                     
        <div class="col-md-12">
            <div class="form-group">
                <strong>Guru 1</strong>
                <select name="kode_guru" class="form-control">
                    <?php foreach ($teachers as $key => $value) { ?>
                        <option value=<?php echo $value->kode; ?>><?php echo $value->name; ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger">{{ $errors->first('kode_guru') }}</span>
            </div>
        </div>

        <?php for($i=2; $i <= 5; $i++) {?>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Guru {{$i}}</strong>
                <select name="kode_guru{{$i}}" class="form-control">
                    <?php foreach ($teachers as $key => $value) { ?>
                        <option value=<?php echo $value->kode; ?>><?php echo $value->name; ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger">{{ $errors->first('kode_guru'.$i) }}</span>
            </div>
        </div>
        <?php } ?>
        

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection