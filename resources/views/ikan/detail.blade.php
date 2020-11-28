@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Ikan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="{{ url('/ikan') }}" class="btn btn-sm btn-info"> <i class="fas fa-angle-double-left"></i> Kembali</a>
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
                    <div class="col-12 col-md-6 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12">
                                <h4>Data Ikan</h4>
                                <hr>
                                <div class="row d-flex align-items-stretch printme">
                                    <div class="col-12 d-flex align-items-stretch">
                                        <div class="card bg-light" id="dataikan">
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
                                        <div id="formikan">
                                            <div class="card card-primary">
                                                <div class="card-header">Edit data ikan <div class="float-sm-right"><button class="btn btn-xs btn-outline-danger " id="batal" type="button"><i class="fa fa-times"></i></button></div>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('ikan.update', $ikan->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}
                                                        <div class="fileinput fileinput-new " data-provides="fileinput">
                                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 120px; height: 160px;">
                                                                <img src="{{route('image.displayImage', $ikan->id)}}" style="width: 120px; height: 160px;" alt="">
                                                            </div>
                                                            <small> <span class="fileinput-filename"></span></small>
                                                            <input type="hidden" name="ikan_id_edit" value="{{ $ikan->id }}">
                                                            <span class="btn-file"> <input type="file" accept="image/*" value="0" name="gambar_ikan_"> </span>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <select class="form-control select2" name="jenis_ikan_id_edit" required>
                                                                        <option value="">Jenis</option>
                                                                        @foreach($jenis as $keya=> $rja)
                                                                        <option @if($keya==$ikan->jenis_ikan_id) selected @endif value="{{ $keya }}">{{ $rja }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <input type="number" name="ukuran_edit" class="form-control" placeholder="Ukuran" value="{{ $ikan->ukuran }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <select class="form-control" name="gender_edit" required>
                                                                        <option value="">Gender</option>
                                                                        <option @if($ikan->gender=='Female') selected @endif value="Female">Female</option>
                                                                        <option @if($ikan->gender=='Male') selected @endif value="Male">Male</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <select class="form-control" name="breeder_edit" required>
                                                                        <option value="">Breeder</option>
                                                                        <option @if($ikan->breeder=='Lokal') selected @endif value="Lokal">Lokal</option>
                                                                        <option @if($ikan->breeder=='Impor') selected @endif value="Impor">Impor</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Team Handling</label>
                                                                        <input value="{{ $ikan->nama_handling??''}}" type="text" required name="nama_handling" id="nama_handling" class="form-control" required placeholder="isi dengan nama team handling">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Kota Handling</label>
                                                                        <input value="{{ $ikan->kota_handling??'' }}" required type="text" name="kota_handling" id="kota_handling" class="form-control" required placeholder="kota asal team handling">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Pemilik Ikan</label>
                                                                        <input value="{{ $ikan->nama_pemilik??'' }}" required type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" required placeholder="Isi dengan nama pemilik ikan">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label>Kota pemilik</label>
                                                                        <input value="{{ $ikan->kota_pemilik??'' }}" required type="text" name="kota_pemilik" id="kota_pemilik" class="form-control" required placeholder="Kota asal pemilik">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pull-right">
                                                                <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6  order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Data Handling</h3>
                        <div class="text-muted">
                            <p class="text-sm" style="margin-bottom: 0px;">No Pendaftaran
                                <b class="d-block">{{ $pendaftaran->code }}</b>
                            </p>
                            <p class="text-sm" style="margin-bottom: 0px;">Team Handling
                                <b class="d-block">{{ $ikan->nama_handling}}</b>
                            </p>
                            <p class="text-sm" style="margin-bottom: 0px;">Kota
                                <b class="d-block">{{ $ikan->kota_handling }}</b>
                            </p>
                        </div>

                        <h5 class="text-muted">Kelengkapan Kontes</h5>
                        <ul class="list-unstyled">
                            @if($cekbayar->count()==1 && $cekbayar->first()->status_bayar<>0)
                                <li>
                                    <a target="_blank" href="{{ url('pendaftaran/stiker') }}/{{ $pendaftaran->id }}?ikan={{ $ikan->id }}" class="btn-link text-secondary"><i class="far fa-fw fa-image"></i> Stiker kantong</a>
                                </li>
                                @endif
                                <li><a href="#" class="btn-link text-secondary" id="editikan"><i class="fa fa-edit"></i> Edit</a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="{{ asset('bootstrap-fileinput/bootstrap-fileinput.css') }}">
@stop
@section('script')
<script src="{{ asset('bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#formikan').hide();
        $("#editikan").click(function() {
            // alert("The paragraph was clicked.");
            $('#dataikan').hide();
            $('#formikan').show();
            $('#editikan').hide();
        });

        // batal
        $("#batal").click(function() {
            // alert("The paragraph was clicked.");
            $('#dataikan').show();
            $('#formikan').hide();
            $('#editikan').show();
        });
    });
</script>
@endsection