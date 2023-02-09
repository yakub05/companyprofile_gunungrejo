@extends('layout.master')
@section('content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>About</h2>
            <p>Pada Halaman Ini Akan Tersedia Informasi Mengenai Destinasi yang Di Miliki Oleh Kedok Ombo</p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="{{ URL::route('index') }}">Home</a></li>
          <li>About</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Work Process Section ======= -->
    <section id="work-process" class="work-process">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Destinasi Wisata </h2>
          <p>Di bawah ini akan dijabarkan apa saja destinasi wisata yang ditawarkan oleh Kedok Ombo untuk pengunjungnya</p>
        </div><br><br>
        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="assets\User\img\logo\KO.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left">
            <h3>Filosofi Logo Kedok Ombo</h3>
            <p class="">
                Gambar tersebut merupakan logo dari kedok ombo yang memiliki arti atau filosofi sebagai berikut :
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Tulisan desa gunung rejo</li>
              <p>Melambangkan bahwa tempat kedok ombo berada di desa gunung rejo</p>
              <li><i class="bi bi-check"></i>Gunung</li>
              <p>Melambangkan bahwa berada dilereng kaki gunung arjuna</p>
              <li><i class="bi bi-check"></i>Lingkar Hijau</li>
              <p>Melambangkan bahwa pemusatan keindahan alam berdominan dengan kehijauan persawahan yang ada di desa gunungrejo.</p>
              <li><i class="bi bi-check"></i>Bundaran dominan putih</li>
              <p>Melambangkan bahwa warna putih memiliki kesucian dan sejarah yang diambil dari sejarah kerajaan kendedes</p>
              <li><i class="bi bi-check"></i>Tulisan est 2023</li>
              <p>Melambangkan bahwa pada tahun 2023 kedok ombo memilki suatu perubahan yang baru pada desa gunungrejo</p>
              <li><i class="bi bi-check"></i>Rusa</li>
              <p>Melambangkan bahwa symbol kelimpahan yang akan terjadi pada desa gunungrejo sebagai desa wisata</p>
              <li><i class="bi bi-check"></i>Pohon</li>
              <p>Melambangkan bahwa symbol abadi, dengan harapan kedok ombo menjadi salah satu potensi desa yang bisa di kenal oleh masyarakat.</p>
            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/User/img/edufarm.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3>Edufarm</h3>
            <p class="">
                Edufarm merupakan fasilitas unggulan yang dibuat untuk para wisatawan. Pada fasilitas ini pengunjung bisa melakukan edukasi tanaman yang baik dan benar, selain itu juga pengunjung dapat membeli hasil dari edufarm kedok ombo
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="assets/User/img/cafe.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5" data-aos="fade-left">
            <h3>Waiting area cafe & resto</h3>
            <p>Cafe sawah merupakan salah satu fasilitas unggulan pada Edufarm Kedok Ombo karena suasana sawah yang asri dan alami serta view pemandangan Gunung Arjuno yang indah. Pada era modern ini, muda mudi sangat tertarik untuk berkumpul dan bercengkrama sambil menikmati kopi dan makananan ringan untuk mengisi waktu atau mendiskusikan sesuatu.</p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/User/img/kolam.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3>Kolam Renang</h3>
            <p class="">
                Kolam renang pada area wisata Kedok Ombo merupakan fasilitas rekreasi seperti fasilitas bermain dan fasilitas bersantai untuk memenuhi kebutuhan rekreasi wisatawan.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Work Process Section -->


      </div>
    </section><!-- End Our Clients Section -->

  </main><!-- End #main -->
