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
          <h1>Gallery</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/Gallery">Gallery</a></li>
            <li class="breadcrumb-item active">Tambah Gallery</li>
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
        <form action="/admin/gallery" method="post" enctype="multipart/form-data" class="mb-5">
          @csrf
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Gallery</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="mb-3">
                  <label for="GalleryFoto" class="form-label">Gambar Gallery</label>
                  <img class="img-preview mb-3" height="30%" width="30%">
                  <input class="form-control" type="file" id="GalleryFoto" name="GalleryFoto" value="{{ old('GalleryFoto') }}" onchange="previewImage()">
                </div> 
              </div>
              <div class="form-group">
                <label for="GalleryJudul" class="form-label">Judul Gallery</label>
                <input type="text" id="GalleryJudul" class="form-control" name="GalleryJudul" value="{{ old('GalleryJudul') }}" required>
              </div>
              <div class="row form-group">
                <label for="GalleryTanggal" class="form-label">Tanggal</label>
                <div class="col-sm-5">
                  <div class="input-group date" data-provide="datepicker" data-date-format='yyyy-mm-dd'>
                    <input type="text" class="form-control" id="GalleryTanggal" name="GalleryTanggal" value="{{ old('GalleryTanggal') }}" required>
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
                <label for="GalleryDeskripsi" class="form-label">Deskripsi Gambar</label>
                @error('GalleryDeskripsi')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="GalleryDeskripsi" type="hidden" name="GalleryDeskripsi" value="{{ old('GalleryDeskripsi') }}">
                <trix-editor input="GalleryDeskripsi" required></trix-editor>
              </div>
              <div class="row">
                <div class="col-12">
                  <a href="/admin/gallery" class="btn btn-secondary">Batal</a>
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
    $( "#GalleryTanggal" ).datepicker("getDate");
  } );
</script>

<script>
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })

    //preview image
    function previewImage(){
    const image = document.querySelector('#GalleryFoto');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

{{-- <script>
  const GalleryJudul =  document.querySelector('#GalleryJudul');
  const GallerySlug = document.querySelector('#GallerySlug');

  GalleryJudul.addEventListener('change', function(){
    fetch('/admin/Gallery/checkSlug?GalleryJudul=' + GalleryJudul.value)
      .then(response => response.json())
      .then(data => GallerySlug.value = data.GallerySlug)
  });
</script> --}}

@endsection