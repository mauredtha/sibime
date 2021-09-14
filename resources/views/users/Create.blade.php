@extends('users.layout')
@section('content')
<form action="{{ route('register') }}" method="POST" name="add_users">
{{ csrf_field() }}
    <div class="row">
    @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Something it's wrong:
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for=""><strong>NIS / NIK</strong></label>
        <input type="text" name="kode" class="form-control" placeholder="NIS / NIK">
    </div>
    <div class="form-group">
        <label for=""><strong>Nama Lengkap</strong></label>
        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
    </div>
    <div class="form-group">
        <label for=""><strong>Email</strong></label>
        <input type="text" name="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
        <label for=""><strong>Password</strong></label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <label for=""><strong>Konfirmasi Password</strong></label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <label for=""><strong>Role</strong></label>
        <?php 
            $role = array('ADMIN'=>'ADMIN', 'GURU'=>'GURU', 'SISWA'=>'SISWA'); ?>
            <select name="role"class="form-control">
            <?php foreach ($role as $key => $value) { ?>
                <option value=<?php echo $key; ?>><?php echo $value;?></option>
            <?php } ?>
            </select>
    </div> 
    <div class="form-group">
        <label for=""><strong>Class</strong></label>
        <?php ?>
            <select name="class_id" class="form-control">
            <?php foreach ($classes as $key => $class) { ?>
                <option value=<?php echo $class->id; ?>><?php echo $class->name;?></option>
            <?php } ?>
            </select>
    </div> 
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
</form>
@endsection