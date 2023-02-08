@extends('layout/admin/panel')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="col-lg-12">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Selamat Datang!</h3>
            </div>
            {{-- <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        
        <section class="col-lg-12">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                @if (Auth::user()->AdminFoto != '')
                <img class="profile-user-img img-fluid img-circle" src="{{ Storage::url('/' . Auth::user()->AdminFoto) }}" alt="User profile picture">
                @else
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets\User\default-img\default-img.jpg') }}">
                @endif
              </div>
      
              <h3 class="profile-username text-center mb-2">{{ (Auth::user()->nama) }}</h3>
      
              {{-- <p class="text-muted text-center">Software Engineer</p> --}}
      
              <ul class="list-group list-group-unbordered mb-4">
                <li class="list-group-item mb-2">
                  <b>Email</b> <a class="float-right">{{ (Auth::user()->email) }}</a>
                </li>
                <li class="list-group-item mb-2">
                  <b>Nomor Telepon</b> <a class="float-right">{{ (Auth::user()->NoTelp) }}</a>
                </li>
                {{-- <li class="list-group-item">
                  <b>Friends</b> <a class="float-right">13,287</a>
                </li> --}}
              </ul>
      
              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section> 
      </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
</div>

  @endsection
  