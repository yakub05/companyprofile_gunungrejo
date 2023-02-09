@extends('layout.master')
@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Gallery</h2>
            <p>Dibawah ini merupakan kumpulan view yang dapat dirasakan oleh pengunjung wisata Kedok Ombo</p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="{{ URL::route('index') }}">Home</a></li>
          <li>Gallery</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        {{-- <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> --}}

        <div class="row portfolio-container" data-aos="fade-up">
          @foreach ($galleryList as $item)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app" {{ $loop->iteration }}>
            <div class="portfolio-wrap">
              @if ($item->GalleryFoto != '')
                <img class="img-fluid" src="{{ asset('storage/' . $item->GalleryFoto)}}" alt="{{ $item->GalleryJudul}}">
              @else
                <img class="img-fluid" src="{{ asset('assets\User\default-img\default-img.jpg') }}" alt="{{ $item->GalleryJudul}}">
              @endif
              {{-- <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""> --}}
              <div class="portfolio-info">
                <h4><a href="Portfolio/detail-Portfolio/{{ $item->id }}">{{ $item->GalleryJudul }}</a></h4>
                <p>{{htmlspecialchars(trim(strip_tags($item->GalleryDeskripsi)))}}</p>
                {{-- <p>{{htmlspecialchars(trim(strip_tags($item->GalleryTanggal)))}}</p> --}}
                <div class="d-flex align-items-center">
                  <i class="bi bi-clock"></i>
                  </p>{{ $item->GalleryTanggal }}</p>
                </div>

                {{-- <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div> --}}
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div>
          {{ $galleryList->withQueryString()->links() }}
        </div>
      </div>

    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
</body>

</html>
