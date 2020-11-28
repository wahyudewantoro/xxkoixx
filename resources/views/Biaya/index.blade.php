@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Biaya Pendaftaran</h1>
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Data Pendukung</a></li>
                    <li class="breadcrumb-item active">Biaya</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-sm-right">
                    @if(usercan('biaya.create'))
                    <a href="{{ route('biaya.create') }}" class="btn btn-sm btn-info"> <i class="fas fa-plus-square"></i> Tambah</a>
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
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
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
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            targets: 0,
            ordering:false,
            ajax: "{{ route('biaya.index') }}",
            columns: [{
                    data: 'created_at',
                    name: 'created_at',
                    class: 'text-center',
                    // orderable: false,
                    searchable: false
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'biaya',
                    name: 'biaya',
                    class: 'text-right',
                    render: function(data, type, row) {
                        return addCommas(data);
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    class:'text-center',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [
                [0, 'asc']
            ],
            "rowCallback": function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }

        });

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return x1 + x2;
        }

    });
</script>
@stop