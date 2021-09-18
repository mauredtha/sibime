@extends('materi.view')
@section('content')
@if(Auth::user()->role == 'Guru')
<span class="navbar-right panel-button-tab-right">
    <a class="btn btn-md btn-default" href="{{ route('add_materi_class', $id) }}" >Add</a>
</span>
Kelas {{$class_name[0]->name}} / Tahun Ajaran {{$class_name[0]->tahun_ajaran}}
@endif
<br><br>
<div class="row">
    <div class="col-16">
        <table class="table table-bordered" id="komponen">
            <thead>
                <tr>
                    @if(Auth::user()->role == 'Guru')
                    <th style="text-align:center;">Mata Pelajaran</th>
                    <th style="text-align:center;">Materi</th>
                    <th style="text-align:center;">Latihan</th>
                    <th style="text-align:center;">Ulangan Harian</th>
                    <th style="text-align:center;">Remedial</th>
                    <th style="text-align:center;" colspan="2"></th>
                    @else
                    <th style="text-align:center;">Materi</th>
                    <th style="text-align:center;">Latihan</th>
                    <th style="text-align:center;">Deadline Latihan</th>
                    <th style="text-align:center;">Ulangan Harian</th>
                    <th style="text-align:center;">Deadline UH</th>
                    <th style="text-align:center;">Remedial</th>
                    <th style="text-align:center;">Deadline Remedial</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @if(Auth::user()->role == 'Siswa')    
            @foreach($data['subjects'] as $subject)
            <tr>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->materi) }}">{{ $subject->materi }}</a>
                </td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->latihan) }}">{{ $subject->latihan }}</a>
                </td>
                <td>{{ $subject->start_latihan.' s/d '.$subject->deadline_latihan }}</td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->ulangan_harian) }}">{{ $subject->ulangan_harian }}</a>
                </td>
                <td>{{$subject->start_uh.' s/d '.$subject->deadline_uh }}</td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$subject->remidial) }}">{{ $subject->remidial }}</a>
                </td>
                <td>{{ $subject->start_remidi.' s/d '.$subject->deadline_remidi }}</td>
            </tr>
            @endforeach
            @else
            @foreach($data['subjects'] as $subject)
                @foreach($subject->ListMateri as $materi)
            <tr>
                <td>
                   {{ $subject->name }}</a>
                </td>
                <td>
                    <a href="{{ Storage::url('uploads/'.$materi->materi) }}">{{ $materi->materi }}</a>
                </td>
                <td>
                    <span>
                    Deadline : {{ $materi->start_latihan.' s/d '.$materi->deadline_latihan }}</span>
                    <br>
                    <a href="{{ Storage::url('uploads/'.$materi->latihan) }}">{{ $materi->latihan }}</a>
                </td>
                <td>
                    <span>
                    Deadline : {{$materi->start_uh.' s/d '.$materi->deadline_uh }}</span>
                    <br>
                    <a href="{{ Storage::url('uploads/'.$materi->ulangan_harian) }}">{{ $materi->ulangan_harian }}</a>
                </td>
                <td>
                    <span>
                    Deadline : {{ $materi->start_remidi.' s/d '.$materi->deadline_remidi }}</span>
                    <br>
                    <a href="{{ Storage::url('uploads/'.$materi->remidial) }}">{{ $materi->remidial }}</a>
                </td>
                <td>
                    <a href="{{ route('subjects.edit',$materi->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('subjects.destroy', $materi->id)}}" method="post">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endforeach
            @endif
            </tbody>
        </table>
</div> 
</div>
@endsection  