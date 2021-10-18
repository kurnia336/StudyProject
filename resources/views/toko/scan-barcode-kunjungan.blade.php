@extends('komponen-layout/master')

@section('title','Dashboard')
@section('css')
   
@endsection

@section('header','Scanner Barcode')
@section('konten')
<div class="container">
    <div class="card card-default">
        <div class="row">
            <div class="col-md-7">
                <main class="wrapper" style="padding-top:2em">
                    <section class="container" id="demo-content">
                        <div>
                            <video id="video" width="300" height="225" style="border: 1px solid gray"></video>
                        </div>                    
                        <div id="sourceSelectPanel" style="display:none">
                            <label for="sourceSelect">Change video source:</label>
                            <select id="sourceSelect" style="max-width:400px">
                            </select>
                        </div>
                        <div>
                            <a class="button btn btn-primary" id="startButton">Start</a>
                            <a class="button btn btn-secondary" id="resetButton">Reset</a>
                        </div>
                                <br>
                            </section>
                        </main>
                    </div>
                    <div class="col-md-5">
                        <div class="hasil" style="margin-top:15px;margin: left 10px;">
                        <!--<form action="{{ url('/scan-kunjungan-toko/hasil') }}" method="post">
                        @csrf-->
                            <div class="form-group">
                                <label>Barcode ID:</label>
                                <input type="text" class="form-control barcode" id="barcode" placeholder="Hasil Barcode" name="barcode">
                            </div>
                            <div class="form-group">
                                <label>Latitude Toko :</label>
                                <input type="text" class="form-control" id="latitude_toko" placeholder="Hasil Barcode" name="barcode" value="">
                            </div>
                            <div class="form-group">
                                <label>longtitude Toko:</label>
                                <input type="text" class="form-control" id="longitude_toko" placeholder="Hasil Barcode" name="barcode" value="">
                            </div>
                            <div class="form-group">
                                <label>Acuracy Toko :</label>
                                <input type="text" class="form-control" id="accuracy_toko" placeholder="Hasil Barcode" name="barcode" value="">
                            </div>
                            <div class="form-group">
                                <label>Latitude:</label>
                                <input type="text" class="form-control" id="latitude" placeholder="Latitude" name="latitude" value="">
                            </div>
                            <div class="form-group">
                                <label>Longitude:</label>
                                <input type="text" class="form-control" id="longitude" placeholder="Longitude" name="longitude" value="">
                            </div>
                            <a class="btn btn-success" id="" href="#" onclick="getLocation()">Generate Location</a>
                            <button class="btn btn-primary" onclick="hasilJarak()">Submit</button>
                        <!--</form>-->
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
@section('script')
    
<script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js"></script>
<script type="text/javascript">
var hasilBarcode;
        window.addEventListener('load', function () {
            let selectedDeviceId;
            const codeReader = new ZXing.BrowserBarcodeReader()
            //console.log('ZXing code reader initialized')
            codeReader.getVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect')
                    selectedDeviceId = videoInputDevices[0].deviceId
                    if (videoInputDevices.length >= 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            sourceSelect.appendChild(sourceOption)
                        })

                        sourceSelect.onchange = () => {
                            selectedDeviceId = sourceSelect.value;
                        }

                        const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                        sourceSelectPanel.style.display = 'block'
                    }

                    document.getElementById('startButton').addEventListener('click', () => {
                        codeReader.decodeOnceFromVideoDevice(selectedDeviceId, 'video').then((result) => {
                            console.log(result)
                            document.getElementById('barcode').value = result.text;
                            //hasilBarcode = result.text;
                            getDataLocation(result.text);
                            //console.log(hasilBarcode);
                        }).catch((err) => {
                            console.error(err)
                            document.getElementById('barcode').value = err
                        })
                        console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
                    })

                    document.getElementById('resetButton').addEventListener('click', () => {
                        document.getElementById('result').textContent = '';
                        codeReader.reset();
                        console.log('Reset.')
                    })

                })
                .catch((err) => {
                    console.error(err)
                })
        });
var latitude_toko;
var longitude_toko;
var accuracy_toko;
function getDataLocation($barcode){
                var id_toko = $barcode;
                $.ajax({
                    url: "{{ url('/scan-kunjungan-toko/getLocationToko') }}",
                    type: "POST",
                    data: {
                        idtoko: id_toko,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $.each(result.location, function (key, value) {
                            longitude_toko = value.longitude;
                            latitude_toko = value.latitude;
                            accuracy_toko = value.accuracy;
                        });
                        document.getElementById('latitude_toko').value = latitude_toko;
                        document.getElementById('longitude_toko').value = longitude_toko;
                        document.getElementById('accuracy_toko').value = accuracy_toko;
                    }
                });
}
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>


var x = document.getElementById("latitude");
var y = document.getElementById("longitude");
var jarak;
var latitude_user;
var longitude_user;
var accuracy_user;
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.value = "Geolocation is not supported by this browser.";
    y.value = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  x.value = position.coords.latitude;
  y.value = position.coords.longitude;
  accuracy_user = position.coords.accuracy;
  latitude_user = position.coords.latitude;
  longitude_user = position.coords.longitude;
}

function hasilJarak(){
console.log(latitude_toko,longitude_toko,latitude_user,longitude_user);
jarak = getDistanceFromLatLonInKm(latitude_toko,longitude_toko,latitude_user,longitude_user);
console.log(jarak);
rata_accuracy();
kesimpulan();
}

function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2-lat1); // deg2rad below
    var dLon = deg2rad(lon2-lon1);
    var a =
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ;
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c * 1000; // Distance in m
    return d;
    }
    
    function deg2rad(deg) {
    return deg * (Math.PI/180)
    }
    function rata_accuracy(){
      var hassil = accuracy_toko+accuracy_user;
      result_acc = hassil/2;
       console.log("rata-rata akurasi : ");
       console.log(result_acc);
    }
    function kesimpulan(){
        if(jarak<=result_acc){
          alert("Success Anda berada di toko success");
        }
        else{
          alert("Maaf! Anda tidak berada di toko error");
        }
    }
</script>
    
@endsection