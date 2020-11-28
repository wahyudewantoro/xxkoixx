@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ $data['title'] }}</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Pendaftaran</a></li>
                    <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ $data['action'] }}" enctype="multipart/form-data">
                    <div class="card card-info">
                        <div class="card-header">
                            Lengkapi data pendaftaran
                        </div>
                        <div class="card-body">

                            {{ csrf_field() }}
                            {{ method_field($data['method']) }}
                            <div class="row">

                                <div class="col-md-6 @if(userRole('Handling')) d-none @endif">
                                    <div class="form-group">
                                        <label>Team Handling</label>
                                        <input @if(userRole('Handling')) value="{{ Auth::user()->name }}" @else value="{{ $data['pendaftaran']->nama_handling??''}}" @endif type="text" name="nama_handling" id="nama_handling" class="form-control" required placeholder="isi dengan nama team handling">
                                    </div>
                                    <div class="form-group">
                                        <label>Kota Handling</label>
                                        <input @if(userRole('Handling')) value="{{ Auth::user()->kota }}" @else value="{{ $data['pendaftaran']->kota_handling??'' }}" @endif type="text" name="kota_handling" id="kota_handling" class="form-control" required placeholder="kota asal team handling">
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input @if(userRole('Handling')) value="{{ Auth::user()->no_hp }}" @else value="{{ $data['pendaftaran']->no_telepon??'' }}" @endif type="text" name="no_telepon" id="no_telepon" class="form-control" required placeholder="No telepon yang bisa di hubungi">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pemilik Ikan</label>
                                        <input value="{{ $data['pendaftaran']->ikan[0]->nama_pemilik??'' }}" type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" required placeholder="Isi dengan nama pemilik ikan">
                                    </div>
                                    <div class="form-group">
                                        <label>Kota pemilik</label>
                                        <input value="{{ $data['pendaftaran']->ikan[0]->kota_pemilik??'' }}" type="text" name="kota_pemilik" id="kota_pemilik" class="form-control" required placeholder="Kota asal pemilik">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto Ikan</label><br>
                                        <button type="button" id="addLampiran" class="btn  btn-success"><i class="fas fa-paperclip"></i> Pilih foto</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="formLampiran">
                                @if($data['method']=='PATCH')
                                @php $rf=0; @endphp
                                @foreach($data['pendaftaran']->ikan as $ikan)
                                <div class="col-md-4 hapus">
                                    <div class="card card-primary">
                                        <div class="card-header">Lengkapi data ikan <div class="float-sm-right"><button class="btn btn-xs btn-outline-danger hapus_lampiran" type="button"><i class="fas fa-trash"></i></button></div>
                                        </div>
                                        <div class="card-body">
                                            <div class="fileinput fileinput-new " data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 120px; height: 160px;">
                                                    <img src="{{route('image.displayImage', $ikan->id)}}" style="width: 120px; height: 160px;" alt="">
                                                </div>
                                                <small> <span class="fileinput-filename"></span></small>
                                                <input type="hidden" name="ikan_id_edit[]" value="{{ $ikan->id }}">
                                                <span class="btn-file"> <input type="file" accept="image/*" value="0" name="gambar_ikan_{{ $rf++ }}"> </span>
                                                <select class="form-control select2" name="jenis_ikan_id_edit[]" required>
                                                    <option value="">Jenis</option>
                                                    @foreach($data['jenis'] as $keya=> $rja)
                                                    <option @if($keya==$ikan->jenis_ikan_id) selected @endif value="{{ $keya }}">{{ $rja }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="number" name="ukuran_edit[]" class="form-control" placeholder="Ukuran" value="{{ $ikan->ukuran }}">
                                                <select class="form-control" name="gender_edit[]" required>
                                                    <option value="">Gender</option>
                                                    <option @if($ikan->gender=='Female') selected @endif value="Female">Female</option>
                                                    <option @if($ikan->gender=='Male') selected @endif value="Male">Male</option>
                                                </select>
                                                <select class="form-control" name="breeder_edit[]" required>
                                                    <option value="">Breeder</option>
                                                    <option @if($ikan->breeder=='Lokal') selected @endif value="Lokal">Lokal</option>
                                                    <option @if($ikan->breeder=='Impor') selected @endif value="Impor">Impor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="float-sm-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                                </div>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>




@stop

@section('css')
<link rel="stylesheet" href="{{ asset('bootstrap-fileinput/bootstrap-fileinput.css') }}">
@stop

@section('script')
<script src="{{ asset('bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
<script>
    $(document).ready(function() {

        var counter_lam = 1;
        $(document).on('click', '#addLampiran', function(e) {

            var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter_lam).attr("class", 'col-md-4 hapus');
            newTextBoxDiv.after().html('<div class="card card-primary">' +
                '<div class="card-header">Lengkapi data ikan <div class="float-sm-right"><button class="btn btn-xs btn-outline-danger hapus_lampiran" type="button"><i class="fas fa-trash"></i></button></div></div>' +
                '<div class="card-body">' +
                '<div class="fileinput fileinput-new " data-provides="fileinput">' +
                '<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 120px; height: 160px;"> </div>' +
                '<input type="hidden" name="ikan_id[]" value="">' +
                '<small> <span class="fileinput-filename"></span></small>' +
                '<span class="btn-file"> <input type="file" id="file_lampiran' + counter_lam + '"  required accept="image/*" name="gambar_ikan[]"> </span>' +
                '<select class="form-control select2" data-placeholder="Jenis ikan" name="jenis_ikan_id[]" required> <option value=""></option><?= $optionjenis ?></select>' +
                '<input type="number" name="ukuran[]" class="form-control" placeholder="Ukuran">' +
                '<select class="form-control" name="gender[]" required> <option value="">Gender</option><option value="Female">Female</option><option value="Male">Male</option></select>' +
                '<select class="form-control" name="breeder[]" required> <option value="">Breeder</option><option value="Lokal">Lokal</option><option value="Impor">Impor</option></select>' +
                '</div>' +
                '</div>');
            newTextBoxDiv.appendTo("#formLampiran");

            $('.select2').select2({
                theme: 'bootstrap4'
            });

            $(document).on('change', "#file_lampiran" + counter_lam, function(e) {
                $('#blah' + counter_lam).html('asfasf');
                // alert('asd');
                filename = $(this).val().split('\\').pop();
                la = filename.split('.');
                vexe = ['jpeg', 'jpg', 'png'];
                exe = la[la.length - 1];
                status = '0';
                for (var i = 0; i < vexe.length; i++) {
                    var name = vexe[i];
                    if (name == exe.toLowerCase()) {
                        status = '1';
                        break;
                    }
                }
                if (status == '0') {
                    $(this).val('');
                    // alert("File tidak di perbolehkan");
                     Swal.fire({
                         title: "Peringatan",
                         text: "File tidak di perbolehkan",
                         type: "warning",
                         timer: 2000,
                     });
                }

                // imagesPreview(this, 'blah'+counter_lam);
                if (input.files && input.files[0]) {
                   
                }



            });
            $('#file_lampiran' + counter_lam).trigger('click');
            counter_lam++;
        });

        $(document).on('click', '.hapus_lampiran', function(e) {
            $(this).parents(".hapus").remove();
        });
       
    });
</script>
@stop