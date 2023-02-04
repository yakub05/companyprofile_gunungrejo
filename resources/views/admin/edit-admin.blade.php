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
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('update', $admin->id) }}" method="post">
            @csrf
            @method('PUT')
        <!-- Admin Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data</h3>
          </div>

            {{-- inputan admin --}}
             <div class="card-body">
                <div class="form-group">
                  <label for="inputName"><i class="fas fa-user mr-1"></i>Nama</label>
                  <input type="text" id="inputName" class="form-control" value="{{$admin->nama}}" name="nama">
                </div>

                <div class="form-group">
                    <label for="inputEmail"><i class="fa fa-envelope mr-1"></i>Email</label>
                    <input type="email" id="inputEmail" class="form-control" value="{{$admin->email}}" name="email">
                </div>

                <div class="form-group">
                    <label for="inputNumber"><i class="fa fa-phone mr-1"></i>No Telp</label>
                    <input type="text" id="input" class="form-control" value="{{$admin->NoTelp}}" name="NoTelp">
                </div>

                <div class="form-group">
                    <label for="inputFoto"><i class="fas fa-image mr-1"></i>Foto Admin</label>
                    <input type="file" id="input" class="form-control" value="{{$admin->AdminFoto}}" name="AdminFoto">
                </div>
                <div class="mb-15">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
             </div>

          </div>
        </div>
        <!-- /.card -->
      <!-- /.row -->
    </form>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
