@extends('course.view')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                    <th style="text-align:center;">Komponen Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
            <?php for ($i=1; $i <= 5; $i++) { ?>
            <tr>
                
                <td>
                    @if($data['course_info']['file'.$i])
                    <a href="{{ Storage::url('uploads/'.$data['course_info']['file'.$i]) }}" target="_blank">{{ $data['course_info']['komponen'.$i] }}</a>
                    @endif
                </td>
            
            
            </tr>
            <?php }?>
            <tr>
                <td>
                    @if(Auth::user()->role == 'Guru')
                    <a href="{{ route('all_materi', $data['course_info']['id']) }}">
                    @else    
                    <a href="{{ route('list_materi', $data['course_info']['id']) }}">
                    @endif Materi Belajar</a>
                </td>
            </tr>
            </tbody>
        </table>

        <table class="table table-bordered" id="guru">
            <thead>
                <tr>
                    <th style="text-align:center;">No</th>
                    <th style="text-align:center;">Nama Guru</th>
                    <th style="text-align:center;">Kode Guru</th>
                </tr>
            </thead>
            <tbody>
            <?php for ($i=1; $i <= 5; $i++) { 
                if($i == 1){
                    $nama_guru = $data['course_info']['nama_guru'];
                    $kode_guru = $data['course_info']['kode_guru'];
                }else {
                    $nama_guru = $data['course_info']['nama_guru'.$i];
                    $kode_guru = $data['course_info']['kode_guru'.$i];
                }
            ?>
            <tr>
                <td style="text-align:center">{{$i}}</td>
                <td>
                    <a href="">{{ $nama_guru }}</a>
                </td>
                <td>{{ $kode_guru }}</td>
            </tr>
            <?php }?>
            </tbody>
        </table>

</div> 
</div>
@endsection  