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

                                        <th>No Ikan</th>
                                        <th>Variety</th>
                                        <th>Ukuran</th>
                                        <th>Owner</th>
                                        <th>Handling</th>

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
            // ordering: false,
            targets: 0,
            ajax: "{{ url('ikan') }}",
            columns: [{
                    data: 'no_ikan',
                    name: 'no_ikan',
                    className:"text-center"
                },
                {
                    data: 'jenis_ikan_nama',
                    name: 'jenis_ikan_nama',
                    render: function(data, type, row) {
                        return data + '<br><code>' + row.breeder + ', ' + row.gender + '</code>';
                    }
                },
                {
                    data: 'ukuran',
                    name: 'ukuran',
                    render: function(data, type, row) {
                        return data + ' <code>CM</code>';
                    }
                },
                {
                    data: 'nama_pemilik',
                    name: 'nama_pemilik',
                    render: function(data, type, row) {
                        return data + '<br><code>' + row.kota_pemilik + '</code>';
                    }
                },
                {
                    data: 'nama_handling',
                    name: 'nama_handling',
                    render: function(data, type, row) {
                        return data + '<br><code>' + row.kota_handling + '</code>';
                    }
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