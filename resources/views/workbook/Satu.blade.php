@extends('workbook.view')
@section('content')
<br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th style="text-align:center;">{{$workbooks[0]->kategori}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($workbooks as $workbook)
            <tr>
            <td>@if($workbook->file)
                <a href="{{ Storage::url('uploads/'.$workbook->file) }}" target="_blank">{{ $workbook->name }}</a>
                @endif
            </td>
            </tr>
@endforeach
</tbody>
</table>

</div> 
</div>
@endsection  