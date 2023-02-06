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
          <h1>Artikel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/artikel">Artikel</a></li>
            <li class="breadcrumb-item active">Edit Artikel</li>
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
        <form action="{{ route('updateartikel', $artikel->id) }}" method="post" enctype="multipart/form-data" class="mb-5">
          @csrf
          @method('PUT')
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Edit Artikel</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="mb-3">
                  <label for="ArtikelFoto" class="form-label">Foto Artikel</label>
                  <div>
                    <img class="img-preview mb-3" display="inline-block" height="30%" width="30%" value="{{ old('ArtikelFoto') }}" src="{{ asset('storage/' . $artikel->ArtikelFoto)}}">
                  </div>
                  <input class="form-control" type="file" id="ArtikelFoto" name="ArtikelFoto" value="{{ $artikel->ArtikelFoto }}" onchange="previewImage()">
                  @error('ArtikelFoto')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div> 
              </div>
              <div class="form-group">
                <label for="ArtikelJudul" class="form-label">Judul Artikel</label>
                <input type="text" id="ArtikelJudul" class="form-control" name="ArtikelJudul" value="{{ $artikel->ArtikelJudul }}" required>
              </div>
              {{-- <div class="form-group">
                <label for="ArtikelSlug" class="form-label">Slug</label>
                <input type="text" id="ArtikelSlug" class="form-control" name="ArtikelSlug" value="{{ $artikel->ArtikelSlug }}">
              </div> --}}
              <div class="row form-group">
                <label for="WaktuPembuatan" class="form-label">Tanggal Pembuatan</label>
                <div class="col-sm-5">
                  <div class="input-group date" data-provide="datepicker" data-date-format='yyyy-mm-dd'>
                    <input type="text" class="form-control" id="WaktuPembuatan" name="WaktuPembuatan" value="{{ $artikel->WaktuPembuatan }}" required>
                    <span class="input-group-append">
                      <span class="input-group-text bg-white">
                        <i class="fas fa-calendar"></i>
                      </span>
                    </span>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Author" class="form-label">Author</label>
                <input type="text" id="Author" class="form-control" name="Author" value="{{ $artikel->Author, old('Author') }}" required>
              </div>
              <div class="form-group">
                <label for="ArtikelDeskripsi" class="form-label">Deskripsi Artikel</label>
                <input id="ArtikelDeskripsi" type="hidden" name="ArtikelDeskripsi" value="{{ $artikel->ArtikelDeskripsi, old('ArtikelDeskripsi') }}">
                <trix-editor input="ArtikelDeskripsi" required></trix-editor>
                @error('ArtikelDeskripsi')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="row">
                <div class="col-12">
                  <a href="/admin/artikel" class="btn btn-secondary">Batal</a>
                  <input type="submit" value="Simpan Perubahan" class="btn btn-success float-right">
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

<script>
    //preview image
  function previewImage(){
  const image = document.querySelector('#ArtikelFoto');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
  }
</script>

@endsection