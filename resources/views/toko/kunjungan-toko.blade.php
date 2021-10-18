@extends('komponen-layout/master')

@section('title','Dashboard')

@section('css')
<!-- css internal place -->

@endsection
@section('header','Kunjungan Toko')
@section('konten')
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!--<h3 class="card-title">DataTable with default features</h3>-->
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                
            </div>
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>BARCODE TOKO</th>
                    <th>NAMA TOKO</th>
                    <th>LATITUDE</th>
                    <th>LONGITUDE</th>
                    <th>ACCURACY</th>
                    <th>EXPORT</th>
                  </tr>
                  </thead>
                  <tbody>
                        @forelse($lokasi_toko as $lokasi)
                            <tr>
                              <td class="text-center">
                              <?php
                                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($lokasi->barcode, $generator::TYPE_CODE_128)) . '">';                                    
                                    /*
                                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                    echo $generator->getBarcode($barangs->id_barang, $generator::TYPE_CODE_128);
                                    */
                                    ?>
                                    <br>
                                    <?= $lokasi->barcode?>
                                </td>
                              <td>{{$lokasi->nama_toko}}</td>
                              <td>{{$lokasi->latitude}}</td>
                              <td>{{$lokasi->longitude}}</td>
                              <td>{{$lokasi->accuracy}}</td>
                              <td><a class="btn btn-outline-success" href="{{url('kunjungan-toko/export/'. $lokasi->barcode)}}">EXPORT PDF</a></td>
                            </tr>
                        @empty
                        <div class="alert alert-danger">
                                      Data Barang belum Tersedia.
                        </div>
                    @endforelse
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>BARCODE TOKO</th>
                    <th>NAMA TOKO</th>
                    <th>LATITUDE</th>
                    <th>LONGITUDE</th>
                    <th>ACCURACY</th>
                    <th>EXPORT</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal Tambah -->
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Toko</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/kunjungan-toko/create') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="barcode">Baroce Number</label>
                        <input type="text" class="form-control" id="barcode" placeholder="Barcode Number" name="barcode" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_toko">Nama Toko</label>
                        <input type="text" class="form-control" id="nama_toko" placeholder="Nama Toko" name="nama_toko" required>
                    </div>
                    <div class="form-group">
                        <label for="latitude">latitude</label>
                        <input type="text" class="form-control" id="latitude" placeholder="Latitude" name="latitude" required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" id="longitude" placeholder="Longitude" name="longitude" required>
                    </div>
                    <div class="form-group">
                        <label for="accuracy">Accuracy</label>
                        <input type="number" class="form-control" id="accuracy" placeholder="Accuracy" name="accuracy" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End modal Tambah -->
    <!-- Modal Export PDF -->
    
<!-- Modal -->
<div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="pdfLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="pdfLabel">Start Export PDF</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/barang/cetakpdf/') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="baris_barang">Baris</label>
                        <input type="number" class="form-control" id="baris_barang" placeholder="baris Barang" name="baris_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="kolom_barang">Kolom</label>
                        <input type="number" class="form-control" id="kolom_barang" placeholder="kolom Barang" name="kolom_barang" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- script internal place -->

@endsection