<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Kedok Ombo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
          <img src="{{ Storage::url('/' . Auth::user()->AdminFoto) }}" class="img-circle elevation" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{(Auth::user()->nama)}}</a>
        </div>
      </div>

      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
                <a href="/admin/home" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/admin/admin" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Admin</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/admin/artikel" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Artikel</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="/admin/gallery" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>Gallery</p>
                </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p> Log Out</p>
            </a>
      </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
