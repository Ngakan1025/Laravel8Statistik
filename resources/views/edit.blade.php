@extends('layout.template')
@section('title', 'Edit Data')

@section('content')

<form action="/skor/update/{{$skor->id}}" method="POST">
    @csrf
    <div class="col-sm-6">
        <div class="form-group">
            <label for="">Skor</label>
            <input type="number" name="skor" id="skor" class="form-control" value="{{$skor->skor}}">
            <div class="text-danger">
                @error('skor')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-sm">Simpan</button>
        </div>
    </div>

</form>


@endsection