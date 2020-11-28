@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Jenis Ikan</h1>
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Data Pendukung</a></li>
                    <li class="breadcrumb-item active">Jenis Ikan</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-sm-right">
                    @if(usercan('jenisikan.create'))
                    <a href="{{ route('jenisikan.create') }}" class="btn btn-sm btn-info"> <i class="fas fa-plus-square"></i> Tambah</a>
                    @endif
                </div>

            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-table">
                        <div class="table-responsive">
                            <table class="table  data-table">
                                <thead class="bg-success text-white ">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Alias</th>
                                        <th width="100px"></th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            targets: 0,
            ajax: "{{ route('jenisikan.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    class: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'kelas',
                    name: 'kelas'
                },
                {
                    data: 'kelas_alias',
                    name: 'kelas_alias'
                },
                {
                    data: 'action',
                    name: 'action',
                    class: 'text-center',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

    });
</script>
@stop