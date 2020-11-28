@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $data['title'] }}</h1>
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Data Pendukung</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('biaya.index') }}">Biaya</a> </li>
                    <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="{{ route('biaya.index') }}" class="btn btn-sm btn-info"><i class="fas fa-angle-double-left"></i> kembali</a>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">Form {{ $data['title'] }}</div>
                    <div class="card-body">
                        <form action="{{ $data['action'] }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field($data['method']) }}

                            <div class="form-group">
                                <label>Ukuran</label>
                                <div class="row">
                                    <div class="col-md-6"><input type="text" placeholder="Minimal" name="ukuran_min" id="ukuran_min" class="form-control onlyangka" required value="{{  $data['biaya']->ukuran_min??'' }}"></div>
                                    <div class="col-md-6"><input type="text" placeholder="Maximal" name="ukuran_max" id="ukuran_max" class="form-control onlyangka" required value="{{  $data['biaya']->ukuran_max??'' }}"></div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Biaya</label>
                                <input type="text" name="biaya" id="biaya" class="form-control onlyangka" required value="{{  $data['biaya']->biaya??'' }}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" required value="{{  $data['biaya']->keterangan??'' }}">
                            </div>


                            <div class="float-sm-right">
                                <button class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $(".onlyangka").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        $("#ukuran_min,#ukuran_max").keyup(function() {
            // $("input").css("background-color", "pink");
            // alert($(this).val());
        });
    });
</script>
@stop