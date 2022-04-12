@extends('layout.template')
@section('title', 'Skor')

@section('content')

<a href="/skor/add" class="btn btn-primary btn-sm">Tambah Data</a> <br>
<!-- <a href="/skor/export" class="btn btn-primary btn-sm">Export File</a>
<br>
<form method="POST" enctype="multipart/form-data" action="{{route('skor.import')}}">
    @csrf
    <div class="mb-3">
        <label for="file" class="form-label">Import</label>
        <input type="file" name="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->

@if(session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Succeess!</h4>
    {{session('pesan')}}
</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Skor</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach($skor as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->skor}}</td>
            <td>
                <a href="/skor/edit/{{$item->id}}" class="btn btn-sm btn-warning">Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$item->id}}">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach($skor as $item)
<div class="modal modal-danger fade" id="delete{{$item->id}}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{$item->Skor}}</h4>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapusnya?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="/skor/delete/{{$item->id}}" class="btn btn-outline">Ya</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

<label for="max" class="ml-4">Skor Maks: <b>{{ $max }}</b></label>
<label for="min" class="ml-4">Skor Min: <b>{{ $min }}</b></label>
<label for="rata2" class="ml-4">Rata-Rata: <b>{{ $rata2 }}</b></label>

<h2>Tabel Frekuensi</h2>
<table class="table">
    <thead>
        <tr>
            <td scope="col">Skor</td>
            <td scope="col">Frekuensi</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($frekuensi as $skor)

        <tr>
            <td> {{ $skor->skor }} </td>
            <td> {{ $skor->frekuensi }}</td>
        </tr>

        @endforeach
        <tr>
            <td> <b>Total Skor:</b> </td>
            <td> {{ $totalskor }}</td>
        </tr>
        <tr>
            <td> <b>Total Frekuensi:</b> </td>
            <td> {{ $totalfrekuensi }}</td>
        </tr>
    </tbody>
</table>

@endsection