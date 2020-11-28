@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Permission</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Sistem</a></li>
                    <li class="breadcrumb-item active">Permission</li>
                </ol>
            </div><!-- /.col -->
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
                    <div class="card-header">
                        <div class="card-title">
                            List data
                        </div>
                        <div class="card-tools">
                            <a href="{{ route('permission.create') }}" class="btn btn-xs btn-primary"><i class=" fas fa-plus-square"></i> Tambah</a>
                        </div>
                    </div>
                    <div class=" card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead class="bg-success text-white ">
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>Permission Name</th>
                                        <th>Role </th>
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
            serverSide: true,
            ordering: false,
            ajax: "{{ url('/permission') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'guard_name',
                    name: 'guard_name'
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