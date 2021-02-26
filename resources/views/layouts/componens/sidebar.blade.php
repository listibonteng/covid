<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tracking Covid-19</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Listianti</a>
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                LOCAL
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="provinsi" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Provinsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kota" class="nav-link">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Kota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kecamatan" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kelurahan" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Kelurahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="rw" class="nav-link">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>RW</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kasus" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Kasus </p>
                </a>
              </li>

            </ul>
          </li>
<br><br>

          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                GLOBAL
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.blade.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Negara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.blade.php" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>Kasus</p>
                </a>
              </li>
            </ul>
          </li>

          
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>