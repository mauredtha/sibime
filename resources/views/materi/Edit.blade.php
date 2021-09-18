@extends('materi.view')
@section('content')
<br>
<form action="{{ route('subjects.update', $materi->id) }}" method="POST" name="update_materi" enctype="multipart/form-data">
{{ csrf_field() }}
@method('PATCH')
    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <strong>Kelas</strong>
                <input type="hidden" name="id_class" value={{$class[0]->id}}>
                <input type="text" name="kelas" class="form-control" value={{$class[0]->name}} readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tahun Ajaran</strong>
                <input type="text" name="tahun_ajar" class="form-control" value={{$class[0]->tahun_ajaran}} readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Mata Pelajaran</strong>
                <select name="ic_course" id="ic_course" class="form-control">
                    @foreach($courses as $key => $val)
                    <option value="{{$val->id}}">{{$val->level.' - '.$val->name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('ic_course') }}</span>
            </div>
        </div> 
        <div class="col-md-12">
            <div class="form-group">
                <strong>Materi</strong>
                <input type="file" name="materi" class="form-control" value="{{ $materi->materi }}">
                @if(! $materi->materi )
                <span class="text-danger">{{ $errors->first('materi') }}</span>
                @endif
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Awal Materi</strong>
                <input type="date" id= "start_materi" name="start_materi" class="form-control" value="{{ $materi->start_materi }}">
                <span class="text-danger">{{ $errors->first('start_materi') }}</span>
            </div>
        </div> 

        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Akhir Materi</strong>
                <input type="date" name="deadline_materi" class="form-control" value="{{ $materi->deadline_materi }}">
                <span class="text-danger">{{ $errors->first('deadline_materi') }}</span>
            </div>
        </div> 

        <div class="col-md-12">
            <div class="form-group">
                <strong>Latihan</strong>
                <input type="file" name="latihan" class="form-control" value="{{ $materi->latihan }}">
                <span class="text-danger">{{ $errors->first('latihan') }}</span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Awal Latihan</strong>
                <input type="date" name="start_latihan" class="form-control" value="{{ $materi->start_latihan }}">
                <span class="text-danger">{{ $errors->first('start_latihan') }}</span>
            </div>
        </div> 

        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Akhir Latihan</strong>
                <input type="date" name="deadline_latihan" class="form-control" value="{{ $materi->deadline_latihan }}">
                <span class="text-danger">{{ $errors->first('deadline_latihan') }}</span>
            </div>
        </div> 

        <div class="col-md-12">
            <div class="form-group">
                <strong>Ulangan Harian</strong>
                <input type="file" name="ulangan_harian" class="form-control" value="{{ $materi->ulangan_harian }}">
                <span class="text-danger">{{ $errors->first('ulangan_harian') }}</span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Awal Ulangan Harian</strong>
                <input type="date" name="start_uh" class="form-control" value="{{ $materi->start_uh }}" >
                <span class="text-danger">{{ $errors->first('start_uh') }}</span>
            </div>
        </div> 

        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Akhir Ulangan Harian</strong>
                <input type="date" name="deadline_uh" class="form-control" value="{{ $materi->deadline_uh }}">
                <span class="text-danger">{{ $errors->first('deadline_uh') }}</span>
            </div>
        </div> 
        
        <div class="col-md-12">
            <div class="form-group">
                <strong>Remidial</strong>
                <input type="file" name="remidial" class="form-control" value="{{ $materi->remidial }}">
                <span class="text-danger">{{ $errors->first('remidial') }}</span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Awal Remidial</strong>
                <input type="date" name="start_remidi" class="form-control" value="{{ $materi->start_remidi }}">
                <span class="text-danger">{{ $errors->first('start_remidi') }}</span>
            </div>
        </div> 

        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Akhir Remidial</strong>
                <input type="date" name="deadline_remidi" class="form-control" value="{{ $materi->deadline_remidi }}">
                <span class="text-danger">{{ $errors->first('deadline_remidi') }}</span>
            </div>
        </div> 
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection

<script>
  $( function() {
    $( "#start_materi" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );
</script>