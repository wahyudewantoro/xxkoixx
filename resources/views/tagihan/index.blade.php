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
                    <div class="card-header">
                        @if(userRole('Handling')==false)
                        <button disabled id="bayar" class="btn btn-sm btn-info"><i class="fas fa-money-check-alt"></i> Bayar </button>
                        <button disabled id="payletter" class="btn btn-sm btn-success"><i class="fas fa-bullseye"></i> Pay Letter </button>
                        @endif
                        <button disabled id="invoice" class="btn btn-sm btn-warning"><i class="fas fa-file-alt"></i> Invoice </button>
                    </div>
                    <div class="card-table">
                        <div class="table-responsive">
                            <table id="example" class="table   data-table">
                                <thead class="bg-success text-white ">
                                    <tr>
                                        <th><input name="checked_all" class="checked_all" type="checkbox"></th>
                                        <th>Registrasi</th>
                                        <th>Handling</th>
                                        <th>Owner</th>
                                        <th>Ikan</th>
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

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            targets: 0,
            ajax: "{{ route('tagihan.index') }}",
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    class: 'text-center',
                    searchable: false,

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

            ],

        });



        $('.checked_all').on('change', function() {
            $('.checkbox').prop('checked', $(this).prop("checked"));
            countCheck();
        });

        $('#example').on('click', 'tbody td .checkbox', function() {
            var total = $('tbody td .checkbox').length;
            var check = $('tbody td .checkbox:checked').length;
            // alert(check);
            if ($('tbody td .checkbox:checked').length == $('tbody td .checkbox').length) {
                $('.checked_all').prop('checked', true);
            } else {
                $('.checked_all').prop('checked', false);
            }
            countCheck();
        });

        function countCheck() {
            var check = $('tbody td .checkbox:checked').length;
            // alert(check);
            if (check == '0') {
                $('#bayar').prop('disabled', true);
                $('#payletter').prop('disabled', true);
                $('#invoice').prop('disabled', true);
            } else {
                $('#bayar').prop('disabled', false);
                $('#payletter').prop('disabled', false);
                $('#invoice').prop('disabled', false);
            }
        }

        function getChecked() {
            var id = [];
            $('tbody td .checkbox:checked').each(function(i) {
                id[i] = $(this).val();
            });
            return id.join(',');

        }

        $('#bayar').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                text: 'Sedang di proses',
                icon: 'info',
                // timer: 3000,
                showConfirmButton: false
            });
            var id = getChecked();
            var id = getChecked();
            $.ajax({
                type: "POST",
                url: "{{ route('tagihan.bayar') }}",
                data: {
                    _token: '{{csrf_token()}}',
                    id: id
                },
                success: function(data) {

                    table.ajax.reload(null, false);
                    $('.data-table').DataTable().ajax.url("{{ route('tagihan.index') }}").load();
                    Swal.fire({
                        type: data.type,
                        text: data.pesan,
                        timer: 1000,
                        showConfirmButton: false
                    });
                    if (data.id != "") {
                        go_to_url = "{{ url('/tagihan/invoice') }}?jenis=bayar&id=" + data.id;
                        window.open(go_to_url, '_blank');
                    }
                },
                error: function() {

                    Swal.fire({
                        text: 'Sistem error',
                        type: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    });

                }
            });
        });

        $('#payletter').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                text: 'Sedang di proses',
                icon: 'info',
                // timer: 3000,
                showConfirmButton: false
            });

            var id = getChecked();
            $.ajax({
                type: "POST",
                url: "{{ route('tagihan.payletter.proses') }}",
                data: {
                    _token: '{{csrf_token()}}',
                    id: id
                },
                success: function(data) {

                    table.ajax.reload(null, false);
                    $('.data-table').DataTable().ajax.url("{{ route('tagihan.index') }}").load();
                    Swal.fire({
                        type: data.type,
                        text: data.pesan,
                        timer: 1000,
                        showConfirmButton: false
                    });
                    if (data.id != "") {
                        go_to_url = "{{ url('/tagihan/invoice') }}?id=" + data.id;
                        window.open(go_to_url, '_blank');
                    }
                },
                error: function() {

                    Swal.fire({
                        text: 'Sistem error',
                        type: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    });

                }
            });
            // alert(getChecked());
        });

        $('#invoice').on('click', function() {
            var id = getChecked();
            if (id != "") {
                go_to_url = "{{ url('/tagihan/invoice') }}?id=" + id;
                window.open(go_to_url, '_blank');
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