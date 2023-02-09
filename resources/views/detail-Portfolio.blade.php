@extends('layout.master')
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Gallery</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="{{ URL::route('index') }}">Home</a></li>
          <li><a href="{{ URL::route('Portfolio') }}">Gallery</a></li>
          <li>{{ $gallery->GalleryJudul}}</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

   <!-- ======= Portfolio Details Section ======= -->
   <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8 text-center">
          @if ($gallery->GalleryFoto != '')
            <img class="img-fluid" src="{{ asset('storage/' . $gallery->GalleryFoto)}}" alt="{{ $gallery->GalleryJudul}}">
          @else
            <img class="img-fluid" src="{{ asset('assets\User\default-img\default-img.jpg') }}" alt="{{ $gallery->GalleryJudul}}">
          @endif
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Judul</strong>: {{$gallery->GalleryJudul}}</li>
              <li><strong>Tanggal</strong>: {{$gallery->GalleryTanggal}}</li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>Deskripsi</h2>
            <p>
              {{htmlspecialchars(trim(strip_tags($gallery->GalleryDeskripsi)))}}
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
</body>

</html>
