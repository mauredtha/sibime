@extends('absence.layout')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">                            
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th style="text-align:center;">No</th>
                    <th style="text-align:center;" colspan="2">Mata Pelajaran</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            @foreach($courses as $course)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $course->name }}</td>
                <td>
                    <a href="{{ route('absensi_detail',$course->id)}}" class="btn btn-primary">Detail</a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
@endsection  