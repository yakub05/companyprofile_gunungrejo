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
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/admin">Admin</a></li>
            <li class="breadcrumb-item active">Tambah Admin</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
      <div class="col-md-20">
        <form action="/admin/admin" method="post" enctype="multipart/form-data" class="mb-5">
          @csrf
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Admin</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="mb-3">
                  <label for="AdminFoto" class="form-label">Gambar Admin</label>
                  <input class="form-control" type="file" id="AdminFoto" name="AdminFoto" value="{{ old('AdminFoto') }}">
                  @error('AdminFoto')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div> 
              </div>
              <div class="form-group">
                <label for="nama" class="form-label">Nama Admin</label>
                <input type="text" id="nama" class="form-control" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @error('email')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <label for="NoTelp" class="form-label">Nomor Telepon</label>
                <input type="text" id="NoTelp" class="form-control" name="NoTelp" value="{{ old('NoTelp') }}" required>
                @error('NoTelp')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}" required>
              </div>
              <div class="row">
                <div class="col-12">
                  <a href="/admin/admin" class="btn btn-secondary">Batal</a>
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

<script type="text/javascript">
  $(function() {
    $( "#WaktuPembuatan" ).datepicker("getDate");
  } );

  // var dateTypeVar = $('#WaktuPembuatan').datepicker("getDate");
  // $( "#WaktuPembuatan" ).datepicker.formatDate('yyyy-mm-dd', dateTypeVar);
</script>

<script>
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
</script>

{{-- <script>
  const nama =  document.querySelector('#nama');
  const AdminSlug = document.querySelector('#AdminSlug');

  nama.addEventListener('change', function(){
    fetch('/admin/Admin/checkSlug?nama=' + nama.value)
      .then(response => response.json())
      .then(data => AdminSlug.value = data.AdminSlug)
  });
</script> --}}

@endsection