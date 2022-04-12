@extends('layout.template')
@section('title', 'Tambah Data')

@section('content')

<form action="/skor/insert" method="POST">
    @csrf
    <div class="col-sm-6">
        <div class="form-group">
            <label for="">Skor</label>
            <input type="number" name="skor" id="" class="form-control" value="{{old('skor')}}">
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