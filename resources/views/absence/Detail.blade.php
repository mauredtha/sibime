@extends('absence.layout')
@section('content')
<span>Total Kehadiran : <?php echo count($absences); ?></span> 
<br><br>
<div class="row">
    <div class="col-12">                          
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th style="text-align:center;">
                    @if(Auth::user()->role == 'Guru')
                    Kode Siswa @else Kode Guru @endif
                    </th>
                    @if(Auth::user()->role == 'Guru')
                    <th style="text-align:center;">Nama Siswa</th>
                    @endif
                    <th style="text-align:center;">Tanggal</th>
                    <th style="text-align:center;">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($absences as $absence)
            <tr>
                <td>{{$absence->kode_guru}}</td>
                @if(Auth::user()->role == 'Guru')
                <td>{{ $absence->nama }}</td>
                @endif
                <td>{{  $absence->created_at }}</td>
                <td>
                @if($absence->status_kehadiran == 1) Hadir @else - @endif
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
@endsection  