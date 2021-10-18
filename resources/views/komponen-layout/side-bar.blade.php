<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if($data == "customer")
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if($cus == "customers")
              <li class="nav-item ">
                <a href="{{ url('/customer') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/customer-tambah1') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Customer 1</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/customer-tambah2') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Customer 2</p>
                </a>
              </li>
            </ul>
          </li>
              @elseif($cus == "customer1")
              <li class="nav-item ">
                <a href="{{ url('/customer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/customer-tambah1') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Customer 1</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/customer-tambah2') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Customer 2</p>
                </a>
              </li>
            </ul>
          </li>
            @else
            <li class="nav-item ">
                <a href="{{ url('/customer') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/customer-tambah1') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Customer 1</p>
              </a>
            </li>
              <li class="nav-item">
                <a href="{{ url('/customer-tambah2') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Customer 2</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @else
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/customer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/customer-tambah1') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Customer 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/customer-tambah2') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Customer 2</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            @if($data == "barang")
            <a href="{{ url('/barang') }}" class="nav-link active">
            @else
            <a href="{{ url('/barang') }}" class="nav-link">
            @endif
            <i class="nav-icon fas fa-table"></i>
              <p>
              Cetak label TnJ 108
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if($data == "barcodeScanner")
            <a href="{{ url('/barcode-scanner') }}" class="nav-link active">
            @else
            <a href="{{ url('/barcode-scanner') }}" class="nav-link ">
            @endif
            <i class="nav-icon fas fa-barcode"></i>
              <p>
             Barcode Scanner
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if($data == "toko")
            <a href="{{ url('/kunjungan-toko') }}" class="nav-link active">
            @else
            <a href="{{ url('/kunjungan-toko') }}" class="nav-link">
            @endif
            <i class="nav-icon fas fa-barcode"></i>
              <p>
                Kunjungan Toko
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if($data == "tokoScan")
            <a href="{{ url('/scan-kunjungan-toko') }}" class="nav-link active">
            @else
            <a href="{{ url('/scan-kunjungan-toko') }}" class="nav-link">
            @endif
            <i class="nav-icon fas fa-barcode"></i>
              <p>
                Scan Kunjungan Toko
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>