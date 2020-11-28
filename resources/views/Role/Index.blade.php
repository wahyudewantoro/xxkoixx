@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Role</h1>
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Sistem</a></li>
                    <li class="breadcrumb-item active">Role</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-sm-right">
                    @if(userCan('role.create'))
                    <a href="{{ route('role.create')}}" class="btn btn-sm btn-primary"><i class=" fas fa-plus-square"></i> Tambah</a>
                    @endif
                </div><!-- /.col -->
            </div>
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class=" card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead class="bg-success text-white ">
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>Role</th>
                                        <th>Permission </th>
                                        <th width="120px"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


@endsection
@section('script')
<script>
    $(document).ready(function() {
        // console.log("ready!");
        $('#table').DataTable({
            processing: true,
            ordering: false,
            serverSide: true,
            ajax: "{{ url('/role') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'permission',
                    name: 'permission',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
            ],
            fnCreatedRow: function(row, data, index) {
                $('td', row).eq(0).html(index + 1);
            }
        });
    });
</script>
@endsection