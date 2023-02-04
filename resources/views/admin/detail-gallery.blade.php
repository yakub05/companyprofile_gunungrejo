@extends('layout/admin/panel')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gallery</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/gallery">Gallery</a></li>
            <li class="breadcrumb-item active">Detail Gallery</li>
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
          
            <div class="col-md-15">
              <!-- Profile Image -->
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="card-img"
                         src=""
                         alt="Gambar">
                  </div>
                </div>
                <!-- /.card-body -->

              <!-- /.card -->
        
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i> Judul</strong>

                <p class="text-muted">
                  {{$gallery->GalleryJudul}}
                </p>

                <hr>
                
                <strong><i class="fa fa-calendar mr-1"></i> Tanggal</strong>

                <p class="text-muted">{{$gallery->GalleryTanggal}}</p>

                <hr>

                <strong><i class="fa fa-quote-left mr-1"></i> Deskripsi</strong>

                <p class="text-muted">{{htmlspecialchars(trim(strip_tags($gallery->GalleryDeskripsi)))}}</p>
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