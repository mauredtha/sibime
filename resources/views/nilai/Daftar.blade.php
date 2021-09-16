@extends('nilai.view')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                    <th style="text-align:center;">Kelas</th>
                    <th style="text-align:center;">Mata Pelajaran</th>
                    <th style="text-align:center;">Guru</th>
                    <th style="text-align:center;">Nilai</th>
                    <th style="text-align:center;">Dokumen</th>
                    <th style="text-align:center;">Tahun Ajaran</th>
                </tr>
            </thead>
            <tbody>
            @foreach($grades as $grade)
            <tr>
                <td>{{ $grade->nama_kelas }}</td>
                <td>{{ $grade->mata_pelajaran }}</td>
                <td>{{ $grade->kode_guru.' - '.$grade->nama_guru }}</td>
                <td>{{ $grade->nilai }}</td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$grade->doc) }}">{{ $grade->doc }}</a>
                </td>
                <td>{{ $grade->tahun_ajar }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div> 
</div>
@endsection  