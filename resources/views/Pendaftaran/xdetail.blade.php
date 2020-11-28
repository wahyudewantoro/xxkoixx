@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Pendaftaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="{{ url('/pendaftaran') }}" class="btn btn-sm btn-info"> <i class="fas fa-angle-double-left"></i> Kembali</a>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="callout callout-success">
                    No registrasi :{{ $pendaftaran->code }}<br>
                    Handling : {{ $pendaftaran->nama_handling}} - {{ $pendaftaran->kota_handling }}
                </div>
                <div class="card card-info">
                    <div class="card-header">Data Ikan</div>
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            @foreach($pendaftaran->ikan as $ikan)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $ikan->jenis_ikan_nama}}</b></h2>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-angle-right"></i></span> Ukuran : {{ $ikan->ukuran }} cm </li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-angle-right"></i></span> Breeder : {{ $ikan->breeder }} </li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-angle-right"></i></span> Gender : {{ $ikan->gender }} </li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-angle-right"></i></span> Owner : {{ $ikan->nama_pemilik }} - {{ $ikan->kota_pemilik }} </li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{route('image.displayImage', $ikan->id)}}" style="width: 120px; height: 160px;" alt="" class="img-thumbnail img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
 