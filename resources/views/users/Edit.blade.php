@extends('users.layout')
@section('content')
<br>
<form action="{{ route('users.update', $data['user_info']->id) }}" method="POST" name="update_user" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
<!-- @method('PUT') -->
<!-- @csrf  -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>NIS/NIK</strong>
                <input type="text" name="kode" class="form-control" placeholder="Enter NIS/NIK" value="{{ $data['user_info']->kode }}">
                @if(!$data['user_info']->kode)
                <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama Lengkap</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Nama" value="{{ $data['user_info']->name }}">
                @if(!$data['user_info']->name)
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $data['user_info']->email }}">
                @if(!$data['user_info']->email)
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" value="{{ $data['user_info']->password }}" readonly>
                @if(!$data['user_info']->password)
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Role</strong>
                <select name="role" class="form-control">
                    
                <?php
                $role = array('Admin'=>'Admin', 'Guru'=>'Guru', 'Siswa'=>'Siswa');
                foreach ($role as $key => $value) { ?>
                     <option value="{{ $key }}" {{ $key == $data['user_info']->role ? 'selected' : '' }}>{{ $value }}</option>
                <?php } ?>
                </select>
                @if(!$data['user_info']->role)
                <span class="text-danger">{{ $errors->first('role') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Class</strong>
                <select name="class_id" class="form-control">
                    
                <?php
                foreach ($classes as $key => $class) { ?>
                     <option value="{{ $class->id }}" {{ $class->id == $data['user_info']->class_id ? 'selected' : '' }}>{{ $class->name }}</option>
                <?php } ?>
                </select>
                @if(!$data['user_info']->class_id)
                <span class="text-danger">{{ $errors->first('class_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection