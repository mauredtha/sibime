@extends('absence.layout')
@section('content')
<span>Total Kehadiran : <?php echo count($absences); ?></span> 
<br><br>
<div class="row">
    <div class="col-12">                          
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th style="text-align:center;">Kode Guru</th>
                    <th style="text-align:center;">Week</th>
                    <th style="text-align:center;">Tanggal</th>
                    <th style="text-align:center;">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($absences as $absence)
            <tr>
                <td>{{$absence->kode_guru}}</td>
                <td>{{ $absence->week }}</td>
                <td>{{ date('d-m-Y', $absence->week) }}</td>
                <td>Hadir</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
@endsection  