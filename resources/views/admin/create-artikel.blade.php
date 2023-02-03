@extends('layout/admin/panel')

@section('content')

<head>
  {{-- Trix Editor --}}
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display:none;
    }
  </style>

  {{-- Date Picker --}}
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- Bootstrap -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js' type='text/javascript'></script>

  <!-- Datepicker -->
  <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>

  <script>
    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })
    // const title = document.querySelector('#artikelJudul');
    // const slug = document.querySelector('#artikelSlug');
  
    // artikelJudul.addEventListener('change', function()){
    //   fetch('/admin/artikel/checkSlug?title=' + title.value)
    //     .then(response => response.json())
    //     .then(data => slug.value = data.slug)
    // }
  </script>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Artikel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/artikel">Artikel</a></li>
            <li class="breadcrumb-item active">Tambah Artikel</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="col-md-20">
        <form action="/admin/artikel" method="post">
          @csrf
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Artikel</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="artikelGambar" class="form-label">Gambar Artikel</label>
                <input type="" id="artikelGambar" class="form-control" name="artikelGambar">
              </div>
              <div class="form-group">
                <label for="artikelJudul" class="form-label">Judul Artikel</label>
                <input type="" id="artikelJudul" class="form-control" name="artikelJudul" required>
              </div>
              <div class="form-group">
                <label for="artikelSlug" class="form-label">Slug</label>
                <input type="" id="artikelSlug" class="form-control" name="artikelSlug">
              </div>
              <div class="form-group">
                <label for="waktuPembuatan" class="form-label">Tanggal Pembuatan</label>
                <div class="input-group date" data-provide="datepicker" name="waktuPembuatan" required>
                  <input type="text" class="form-control">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="author" class="form-label">Author</label>
                <input type="" id="author" class="form-control" name="author" required>
              </div>
              <div class="form-group">
                <label for="artikelDeskripsi" class="form-label">Deskripsi Artikel</label>
                <input id="artikelDeskripsi" type="hidden" name="artikelDeskripsi" required>
                <trix-editor input="artikelDeskripsi"></trix-editor>
              </div>
              <div class="row">
                <div class="col-12">
                  <a href="#" class="btn btn-secondary">Batal</a>
                  <input type="submit" value="Tambah Data" class="btn btn-success float-right">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </form>
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection