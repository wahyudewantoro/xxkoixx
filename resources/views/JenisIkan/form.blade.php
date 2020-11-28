@extends('adminlte::page')

@section('title', $title )

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>{{ $title }}</h1>

    </div>
    <div class="col-sm-6">
        <div class="float-sm-right">
        
            <a href="{{ route('jenisikan.index') }}" class="btn btn-sm btn-info"><i class="fas fa-angle-double-left"></i> kembali</a>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">Form {{ $title }}</div>
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field($method) }}

                    <input class="form-control" type="hidden" name="id" id="id" value="{{ $data['JenisIkan']->id??'' }}">
                    <div class="form-group">
                        <label>Nama Ikan</label>
                        <input class="form-control" type="text" placeholder="Nama jenis ikan" name="nama" id="nama" value="{{ $data['JenisIkan']->nama??'' }}" required>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input class="form-control" type="text" name="kelas" placeholder="Kelas" id="kelas" value="{{ $data['JenisIkan']->kelas??'' }}" required>
                    </div>
                    <div class="form-group">
                        <label>Kelas Alias</label>
                        <input class="form-control" type="text" name="kelas_alias" placeholder="Nama lain dari kelas" id="kelas_alias" value="{{ $data['JenisIkan']->kelas_alias??'' }}" required>
                    </div>
                    <div class="form-group">
                        <label>Sort</label>
                        <input class="form-control" type="number" name="sort" id="sort" placeholder="Urutan jenis ikan" value="{{ $data['JenisIkan']->sort??'' }}" required>
                    </div>
                    <div class="float-sm-right">
                        <button class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')

@stop

@section('js')
<script>

</script>
@stop