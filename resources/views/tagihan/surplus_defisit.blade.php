@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tagihan</h1>
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
                                        <th>Ikan</th>
                                        <th>Handling</th>
                                        <th>Owner</th>
                                        <th>Biaya</th>
                                        <th>Terbayar</th>
                                        <th>Surplus / Defeisit</th>
                                        <th></th>
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
<div id="res"></div>
@endsection
@section('script')
<script>
    $(document).ready(function() {

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

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            targets: 0,
            ajax: "{{ route('tagihan.surplus.defisit') }}",
            columns: [{
                    data: 'no_ikan',
                    class: 'text-center',
                    searchable: false,

                },
                {
                    data: 'jenis_ikan_nama',
                    name: 'jenis_ikan_nama',
                    render: function(data, type, row) {
                        return data + '<br><code>' + row.ukuran + ' cm, (' + row.breeder + ', ' + row.gender + ')</code>';
                    }
                },
                {
                    data: 'handling',
                    name: 'handling',
                },
                {
                    data: 'pemilik',
                    name: 'pemilik'
                },
                {
                    data: 'biaya',
                    name: 'biaya',
                    class: "text-right",
                    render: function(data, type, row) {
                        return addCommas(data);
                    }
                },
                {
                    data: 'terbayar',
                    name: 'terbayar',
                    class: "text-right",
                    render: function(data, type, row) {
                        return addCommas(data);
                    }
                },
                {
                    data: 'surplus_defisit',
                    name: 'surplus_defisit',
                    class: "text-right",
                    render: function(data, type, row) {
                        if (data < 0) {
                            ket = 'lebih bayar';
                        } else {
                            ket = 'Kurang bayar';
                        }

                        return addCommas(data) + '<br><small><code>NB:' + ket + '</small></code>';
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    search: false,
                    class: 'text-center'
                },
            ],

        });


        $('#example tbody').on('click', 'button', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikanya!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Lakukan!'
            }).then((result) => {
                // alert($(this).data('url'));
                if (result.value) {
                    document.location.href = $(this).data('url');
                }
            })

        });



        function addCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

    });
</script>
@stop