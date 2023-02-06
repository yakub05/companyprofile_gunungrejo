@extends('layout/admin/panel')

@section('content')

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
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Data Admin</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="mt-2">
      @if(Session::has('status'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
          </div>
      @endif
    </div>
    <div class="my-3 d-flex align-items-end flex-column">
      <form action="" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="keyword" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-secondary">Cari</button>
        </div>
      </form>
    </div>

    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="card-body">
                <h3 class="card-title">Data Admin</h3>
            </div>
            <div class="card-tools">
              <a href="admin/create-admin"><button type="button" class="btn btn-block btn-warning">Tambah Admin</button></a>
            </div>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        No.
                    </th>
                    <th style="width: 20%">
                        Foto Profil
                    </th>
                    <th style="width: 30%">
                        Nama Admin
                    </th>
                    <th style="width: 30%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adminList as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="card-img" src="{{ asset('storage/' . $item->AdminFoto)}}" alt="{{ $item->nama }}"></td>
                        <td>{{ $item->nama }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="admin/detail-admin/{{ $item->id }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="admin/edit-admin/{{ $item->id }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="delete-admin/{{$item->id}}">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div>
      {{ $adminList->withQueryString()->links() }}
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
