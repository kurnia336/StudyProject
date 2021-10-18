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
                            <label>Result:</label>
                            <pre><code id="result"></code></pre>
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
                            document.getElementById('result').textContent = result.text
                        }).catch((err) => {
                            console.error(err)
                            document.getElementById('result').textContent = err
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
        
    </script>
    
@endsection