@extends('layouts.app')
@section('content')
 
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ikan Terdaftar</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-sm-right">
                    @if(userCan('daftar.create'))
                    <a href="{{ url('/pendaftaran/create') }}" class="btn btn-sm btn-info"> <i class="fas fa-plus-square"></i> Registrasi</a>
                    @endif
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-table">
                        <div class="table-responsive">
                            <table id="example" class="table   data-table">
                                <thead class="bg-success text-white ">
                                    <tr>
                                        <th>No</th>
                                        <th>Registrasi</th>
                                        <th>Handling</th>
                                        <th>Owner</th>
                                        <th>Ikan</th>
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
            ordering: false,
            targets: 0,
            ajax: "{{ route('pendaftaran.index') }}",
            columns: [{
                    data: 'created_at',
                    name: 'created_at',
                    class: 'text-center',
                    // orderable: false,
                    searchable: false
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'nama_handling',
                    name: 'nama_handling',
                    render: function(data, type, row) {
                        return data + '<br><code>' + row.kota_handling + '</code>';
                    }
                },
                {
                    data: 'pemilik',
                    name: 'pemilik'
                },
                {
                    data: 'ikan',
                    name: 'ikan'
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
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
            },
            fnDrawCallback: function(row, data, index) {

            },

        });




        $('#example tbody').on('click', 'button', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data dengan nomer registrasi " + $(this).data('reg') + " akan di hapus !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya ,hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $('#form-hapus').trigger('submit');
                }
            })
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