@extends('layout/admin/panel')

@section('tile', 'Artikel')

@section('content')

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
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Data Artikel</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="card-body">
                <h3 class="card-title">Data Artikel</h3>
            </div>
            <div class="card-tools">
              <a href="artikel/create-artikel"><button type="button" class="btn btn-block btn-warning">Tambah Artikel</button></a>
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
                    <th style="width: 10%">
                        Gambar
                    </th>
                    <th style="width: 20%">
                        Judul Artikel
                    </th>
                    <th>
                        Tanggal Pembuatan
                    </th>
                    <th style="width: 30%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikelList as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="card-img" src="{{ asset('storage/' . $item->ArtikelFoto)}}" alt="{{ $item->ArtikelJudul}}"></td>
                        {{-- <td>{{ $item->ArtikelFoto }}</td> --}}
                        <td>{{ $item->ArtikelJudul }}</td>
                        <td>{{ $item->WaktuPembuatan }}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="artikel/detail-artikel/{{$item->id}}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
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

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>

</script>

@endsection