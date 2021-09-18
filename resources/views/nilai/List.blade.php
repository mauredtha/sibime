@extends('nilai.view')
@section('content')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('add_nilai_class',$id) }}" >Add</a>
</span>
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                    <th style="text-align:center;">Kelas</th>
                    <th style="text-align:center;">Mata Pelajaran</th>
                    <th style="text-align:center;">Nama Siswa</th>
                    <th style="text-align:center;">Nilai</th>
                    <th style="text-align:center;">Dokumen</th>
                    <th style="text-align:center;">Tahun Ajaran</th>
                    <th style="text-align:center;" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($data['grades'] as $grade)
            <tr>
                <td>{{ $grade->nama_kelas }}</td>
                <td>{{ $grade->mata_pelajaran }}</td>
                <td>{{ $grade->kode_siswa.' - '.$grade->nama }}</td>
                <td>{{ $grade->nilai }}</td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$grade->doc) }}">{{ $grade->doc }}</a>
                </td>
                <td>{{ $grade->tahun_ajar }}</td>
                <td>
                    <a href="{{ route('grades.edit',$grade->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('grades.destroy', $grade->id)}}" method="post">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div> 
</div>
@endsection  