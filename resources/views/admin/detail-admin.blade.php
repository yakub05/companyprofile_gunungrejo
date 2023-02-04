@extends('layout/admin/panel')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/admin">Admin</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <!-- Admin Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Detail</h3>
          </div>
          <div class="row">
            <div class="col-md-4">
              <!-- Profile Image -->
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="card-img img-circle"
                         src=""
                         alt="Foto Profil User">
                  </div>
                </div>
                <!-- /.card-body -->
              <!-- /.card -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fa fa-user mr-1"></i> Nama</strong>

              <p class="text-muted">
                {{$admin->nama}}
              </p>

              <hr>

              <strong><i class="fa fa-envelope mr-1"></i> Email</strong>

              <p class="text-muted">{{$admin->email}}</p>

              <hr>

              <strong><i class="fa fa-phone mr-1"></i> Nomor Telepon</strong>

              <p class="text-muted">{{$admin->NoTelp}}</p>

              <div class="col card-header text-right">
                <button type="button" class="btn btn-secondary" href="/admin/admin">Kembali </button>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.card -->
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
