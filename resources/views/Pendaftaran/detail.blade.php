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
        <!-- Default box -->
        <div class="card d-print-none">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Owner</span>
                                        <span class="info-box-number text-center text-muted mb-0">
                                            @php $jo=0; $to=''; @endphp
                                            @foreach($pendaftaran->ikan as $ow)
                                            @if($ow->nama_pemilik!=$to)
                                            @php $jo+=1; @endphp
                                            @endif
                                            @php $to=$ow->nama_pemilik; @endphp
                                            @endforeach
                                            {{ $jo }} Orang
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Ikan</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $pendaftaran->ikan->count()  }} Ekor </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Data Ikan Terdaftar</h4>
                                <hr>
                                <div class="row d-flex align-items-stretch printme" id="cetak">
                                    @foreach($pendaftaran->ikan as $ikan)
                                    <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
                                        <div class="card bg-light">
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b>{{ $ikan->jenis_ikan_nama}}</b></h2>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            <li class="small"><span class="fa-li"><i class="fas fa-angle-right"></i></span> No : {{ $ikan->register->id }} </li>
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
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Data Handling</h3>
                        <div class="text-muted">
                            <p class="text-sm" style="margin-bottom: 0px;">No Pendaftaran
                                <b class="d-block">{{ $pendaftaran->code }}</b>
                            </p>
                            <p class="text-sm" style="margin-bottom: 0px;">Team Handling
                                <b class="d-block">{{ $pendaftaran->nama_handling}}</b>
                            </p>
                            <p class="text-sm" style="margin-bottom: 0px;">Kota
                                <b class="d-block">{{ $pendaftaran->kota_handling }}</b>
                            </p>
                        </div>
                        @if($cekbayar->count()==1 && $cekbayar->first()->status_bayar<>0)
                        <h5 class="text-muted">Kelengkapan Kontes</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a target="_blank" href="{{ url('tagihan/invoice') }}?id={{ $id }}" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Invoice</a>
                            </li>
                            <li>
                                <a target="_blank" href="{{ url('pendaftaran/kartu') }}/{{ $id }}" id="printButton" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> Kartu Ikan</a>
                            </li>
                            <li>
                                <a target="_blank" href="{{ url('pendaftaran/stiker') }}/{{ $id }}" class="btn-link text-secondary"><i class="far fa-fw fa-image"></i> Stiker kantong</a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
@section('css')
<style>

</style>
@endsection
@section('script')


<script>
    function printDiv(divName) {
        // alert(divName);
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection