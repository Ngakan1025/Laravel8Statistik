@extends('layout.template')

@section('title', 'Korelasi Product Moment')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="d-flex justify-content-end">
            <a href="/exportmoment" class="btn btn-danger mt-2 mb-2 mr-3">
                Export
            </a>
            <a href="#" class="btn btn-success mt-2 mb-2" data-toggle="modal" data-target="#korelasiModal">
                Import Korelasi Moment
            </a>
            <!-- Modal -->
            <div class="modal fade" id="korelasiModal" tabindex="-1" role="dialog" aria-labelledby="korelasiModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import File Korelasi Moment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/importmoment" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                    <p class="mt-1"> <i>File yang disupport: .xlxs dan .csv</i> </p>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                    @csrf

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <p class="h3">Silahkan Masukkan X dan Y</p>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/korelasiMoment" id="forminput">
                    {{-- setelah di submit, form akan mengarah ke route home--}}
                    <div class="form-group">
                        <label for="input2">Input X</label>
                        <input required type="text" class="form-control mb-2" placeholder="Masukkan Nilai X" name="x"
                            value="{{ old('x') }}">
                        <label for="input2">Input Y</label>
                        <input required type="text" class="form-control mb-2" placeholder="Masukkan Nilai y" name="y"
                            value="{{ old('y') }}">


                        @if ($errors->has('x'))
                        <div class="alert alert-danger">{{ $errors->first('x') }}</div>
                        @endif

                        @if ($errors->has('y'))
                        <div class="alert alert-danger">{{ $errors->first('y') }}</div>
                        @endif


                    </div>
                    <input type="submit" class="btn btn-primary daftar-btn mt-4" name="submit" value="Input">
                    {{-- tombol submit--}}

                    @csrf

                    @if (session('status'))
                    <p></p>
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
                <p class="h3">Korelasi Point Moment</p>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>X</th>
                            <th>Y</th>
                            <th>x</th>
                            <th>y</th>
                            <th>x^2</th>
                            <th>y^2</th>
                            <th>xy</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < $jumlahData; $i++) <tr>


                            <th>{{ $i+1 }}</th>
                            <td>{{ $moments[$i]->x}}</td>
                            <td>{{ $moments[$i]->y}}</td>
                            <td>{{ $xKecil[$i] }}</td>
                            <td>{{ $yKecil[$i] }}</td>
                            <td>{{ $xKuadrat[$i] }}</td>
                            <td>{{ $yKuadrat[$i] }}</td>
                            <td>{{ $xKaliY[$i] }}</td>
                            <td>
                                <form name="delete" action="/hapusMoment/{{ $moments[$i]->id }}" method="POST">
                                    {{-- setelah klik hapus, form akan mengarah ke route delete--}}
                                    @csrf {{-- csrf token untuk tombol hapus--}}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                            </tr>
                            @endfor
                            <tr>
                                <th> Jumlah: </th>
                                <th> {{ $sumX }}</th>
                                <th> {{ $sumY}} </th>
                                <th></th>
                                <th></th>
                                <th> {{ $sumXKuadrat }}</th>
                                <th> {{ $sumYKuadrat }}</th>
                                <th> {{ $sumXY }}</th>
                            </tr>
                            <tr>
                                <th>Rata-Rata: </th>
                                <th> {{ number_format($rata2X,2) }}</th>
                                <th> {{ number_format($rata2Y,2) }}</th>
                            </tr>
                    </tbody>
                </table>
                <table class="table text-left">
                    <tr>
                        <td> <b> Nilai Korelasi Point Moment : </b> &nbsp {{ $korelasimoment }} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection