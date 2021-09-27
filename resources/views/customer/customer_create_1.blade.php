@extends('komponen-layout/master')

@section('title','Customer Tambah 1')

@section('css')
<!-- css internal place -->
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
@endsection
@section('header','Customer Tambah 1')
@section('konten')
<!-- Content Body place -->
<!-- SELECT2 EXAMPLE -->
<div class="container">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Tambah Customer(Blob image)</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
              <!-- /.card-header -->
        <div class="card-body">
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <form action="{{ url('customer-tambah1/store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_cutomer">Nama</label>
                            <input type="text" class="form-control" id="nama_cutomer" placeholder="Nama" name="nama_customer">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat_customer">Alamat</label>
                            <input type="text" class="form-control" id="alamat_customer" placeholder="Alamat" name="alamat_customer">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Provinsi</label>
                          <select class="form-control select2" id="provinsi" style="width: 100%;">
                            <option selected="selected">Select Provinsi</option>
                            @forelse($prov as $provs)
                                <option value="{{$provs->prov_id}}">{{$provs->prov_name}}</option>
                            @empty
                            <option value="">None</option>
                            @endforelse
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Kota</label>
                          <select id="kota" class="form-control select2" style="width: 100%;">
                            
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Kecamatan</label>
                          <select id="kecamatan" class="form-control select2" style="width: 100%;">
                            
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Kelurahan</label>
                          <select id="kelurahan" class="form-control select2" style="width: 100%;" name="id_kelurahan" require>
    
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="results" style="border-style: solid; width:350px;height:250px;text-align:center;">Your captured image will appear here...</div>
                        <input type="hidden" name="image" class="image-tag">
                        <center style="margin-left:-100px">
                            <button type="button" class="btn btn-primary" style="margin-top:10px;text-align:center" data-toggle="modal" data-target="#exampleModal">Ambil Foto</button>
                        </center>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6" >
                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                    </div>
            
                    <!-- </div> -->
            </form>
        </div>
        <!-- /.row -->
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Camera on</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="my_camera" style="border-style: solid;width:360px;height:250px;"> camera on in here</div>
                        <center>
                            <br>
                            <input type="button" class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
                        </center>
                        <input type="hidden" name="image" class="image-tag">
                    <!-- <br/> -->
                    </div>
                    <div class="col-md-6">
                    <div id="resultSementara" style="border-style: solid; width:350px;height:250px;text-align:center;">Your captured image will appear here...</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- script internal place -->
<!-- ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script>
function hasGetUserMedia() {
  return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
}
if (hasGetUserMedia()) {
    

    Webcam.set({
            width: 350,
            height: 250,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
  
        Webcam.attach( '#my_camera' );
            function take_snapshot() {
                Webcam.snap( function(data_uri) {
  
                    $(".image-tag").val(data_uri);
                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                    document.getElementById('resultSementara').innerHTML = '<img src="'+data_uri+'"/>';
                } );
            }  

} else {
  alert("getUserMedia() is not supported by your browser");
}
        $(document).ready(function () {
            $('#provinsi').on('change', function () {
                var idprov = this.value;
                //console.log(idprov);
                $("#kota").html('');
                $.ajax({
                    url: "{{ url('/customer_tambah1/cities') }}",
                    type: "POST",
                    data: {
                        prov_id: idprov,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#kota').html('<option selected="selected">Select Kota</option>');
                        $.each(result.cities, function (key, value) {
                            $("#kota").append('<option value="' + value
                                .city_id + '">' + value.city_name + '</option>');
                        });
                        $('#kecamatan').html('<option selected="selected">Select Kecamatan</option>');
                        $('#kelurahan').html('<option selected="selected">Select Kelurahan</option>');
                    }
                });
            });
            $('#kota').on('change', function () {
                var dis_id = this.value;
                $("#kecamatan").html('');
                $.ajax({
                    url: "{{url('/customer_tambah1/districs')}}",
                    type: "POST",
                    data: {
                        dist_id: dis_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#kecamatan').html('<option selected="selected">Select City</option>');
                        $.each(res.districs, function (key, value) {
                            $("#kecamatan").append('<option value="' + value
                                .dis_id + '">' + value.dis_name + '</option>');
                        });
                        $('#kelurahan').html('<option selected="selected">Select Kelurahan</option>');
                    }
                });
            });
            $('#kecamatan').on('change', function () {
                var dis_id = this.value;
                $("#kelurahan").html('');
                $.ajax({
                    url: "{{url('customer_tambah1/subdistrics')}}",
                    type: "POST",
                    data: {
                        subdis_id: dis_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#kelurahan').html('<option value="">Select Kelurahan</option>');
                        $.each(res.subdistrics, function (key, value) {
                            $("#kelurahan").append('<option value="' + value
                                .subdis_id + '">' + value.subdis_name + '</option>');
                        });
                    }
                });
            });
        });
        
</script>
@endsection