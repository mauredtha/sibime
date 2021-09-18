@extends('materi.view')
@section('content')
<div class="panel-heading">
    All Materi Kelas {{$mapel[0]->level}}
</div>
<br><br>
<div class="row">
    <div class="col-16">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                    <th style="text-align:center;">Mata Pelajaran</th>
                    <th style="text-align:center;">Materi</th>
                    <th style="text-align:center;">Latihan</th>
                    <th style="text-align:center;">Ulangan Harian</th>
                    <th style="text-align:center;">Remedial</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data['subjects'] as $subject)
            <tr>
                <td>
                   {{ $mapel[0]->name }}</a>
                </td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->subject) }}">{{ $subject->materi }}</a>
                </td>
                <td>
                    <span>
                    Deadline : {{ $subject->start_latihan.' s/d '.$subject->deadline_latihan }}</span>
                    <br>
                    <a href="{{ Storage::url('uploads/'.$subject->latihan) }}">{{ $subject->latihan }}</a>
                </td>
                <td>
                    <span>
                    Deadline : {{$subject->start_uh.' s/d '.$subject->deadline_uh }}</span>
                    <br>
                    <a href="{{ Storage::url('uploads/'.$subject->ulangan_harian) }}">{{ $subject->ulangan_harian }}</a>
                </td>
                <td>
                    <span>
                    Deadline : {{ $subject->start_remidi.' s/d '.$subject->deadline_remidi }}</span>
                    <br>
                    <a href="{{ Storage::url('uploads/'.$subject->remidial) }}">{{ $subject->remidial }}</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div> 
</div>
@endsection  