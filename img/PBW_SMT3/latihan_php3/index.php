<?php
//menyertakan code dari file koneksi
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tugas CSS Framework</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <style>
    .uniform-img{
      aspect-ratio: 16/9;
      width: 100%;
      object-fit: cover;
    }

   body {
    font-family: Arial, Helvetica,
    sans-serif;
    background-color: #fff;
    color: #333;
    transition: background-color 8.
    3s, color 0.3s;
    }

    .dark-mode {
      background-color: #1e1e1e;
      color: white;
    }

    nav {
    padding: 10px;
    }

  </style>
  </head>

  <body>
    
    <!-- nav begin -->
    <nav class="navbar navbar-expand-lg bg-success navbar-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">Crypto Knowledge</a>
        <div>
          <i class="bi bi-currency-bitcoin bg-danger-subtle"></i>
        </div>
        <button class="navbar-toggler" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#navbarNav" 
        aria-controls="navbarNav" 
        aria-expanded="false" 
        aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-lg-0 text-dark">
            <li class="nav-item">
              <a class="nav-link text-white" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#kontak">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#aboutme">About Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="login.php" target="_blank">Login</a>
            </li>
          </ul>
        </div>
      </div>
      <button id="dark-mode-toggle" class="toggle-btn">🌙</button>
    </nav>
    <!-- nav end -->

    <!-- hero begin -->
        <section id="hero" class="text-center p-5 bg-secondary text-sm-end">
          <div class="container">
              <div class="d-sm-flex flex-sm-row align-items-center">
                  <img src="img/Cryptocurrency_logos.jpg" class="img-fluid" width="300">
                  <div>
                    <h1 class="fw-bold display-4">Rekomendasi 5 Exchange Terbaik di Dunia Versi CoinMarketCap </h1>
                    <h4 class="lead display-6">Berikut adalah daftar 5 exchange kripto terbaik berdasarkan data Coinmarketcap </h4>
                    <span id="tanggal"></span>
                    <span id="jam"></span>
                  </div>
              </div>
          </div>
    </section>
    <!-- hero end -->

    <!-- article begin -->
      <section id="home" class="text-center p-5 bg-warning">
        <div class="container">
        <h1 class="fw-bold display-4 pb-3">Article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql); 

        while($row = $hasil -> fetch_assoc()){
        ?>
        <!-- col begin -->
        <div class="col">
        <div class="card h-100">
        <img src="<?= $row["gambar"]?>" class="card-img-top uniform-img" alt="..." />
        <div class="card-body">
        <h5 class="card-title"><?= $row["judul"]?></h5>
        <p class="card-text"> 
             <?= $row["isi"]?>
        </p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
        <?= $row["tanggal"]?>
      </div>
    </div>
  </div>
    <!--col end -->
    <?php
    }
    ?>
    </div>
  </div>
    </section>
    <!-- article end  -->

    <!-- gallery begin -->
     <section id="gallery" class="text-center p-5 bg-info">
      <div class="container">
          <h1 class="fw-bold display-4 pb-3">Gallery</h1>
        <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/bitget.png" class="d-block w-100" alt="..." width="300" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/gigapixel-binance.jpeg" class="d-block w-100" alt="..." width="300" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/coinbase.jpg" class="d-block w-100" alt="..." width="300" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/okx.jpg" class="d-block w-100" alt="..." width="300" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/bybit.jpeg" class="d-block w-100" alt="..." width="300" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/gambar1-pica.png" class="d-block w-100" alt="..." width="300" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/gambar2-pica.png" class="d-block w-100" alt="..." width="300" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/gambar3-pica.png" class="d-block w-100" alt="..." width="300" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/gambar4-pica.png" class="d-block w-100" alt="..." width="300" height="500">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>
     </section>
      <!-- gallery end  -->
       
      <!-- kontak begin -->
     <section id="kontak" class="text-center p-5 bg-danger-subtle">
      <div class="container">
          <h1 class="fw-bold display-4 pb-3">Kontak</h1>
          <div class="form-floating mb-3">
          <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda">
          <label for="nama">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <label for="pesan">Pesan</label>
          <textarea class="form-control" id="pesan" placeholder="Masukkan Pesan Anda" rows="4" cols="30"></textarea>
        </div>
        </div>
     </section>
     <!-- kontak end  -->

      <!-- schedule begin -->
          <section id="schedule" class="p-5 bg-primary">
          <h1 class="fw-bold display-4 pb-3 justify-content-center">Schedule</h1>
         <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Membaca</h5>
        <p class="card-text"> Menambah wawasan setiap pagi sebelum beraktivitas. </p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Menulis</h5>
        <p class="card-text"> 
          Mencatat setiap pengalaman harian di jurnal pribadi.
        </p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Diskusi</h5>
        <p class="card-text">  
        </p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Olahraga</h5>
        <p class="card-text"> </p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Movie</h5>
        <p class="card-text"> 
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Belanja</h5>
        <p class="card-text"> 
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
            </div>
          </section>
      <!-- schedule end -->

      <!-- aboutme begin -->
       <section id="aboutme" class="text-center p-5 bg-danger-subtle">
        <h1 class="fw-bold display-4 pb-3">About Me</h1>
          <div class="accordion" id="accordionExample">
          <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button bg-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Universitas Dian Nuswantoro Semarang (2024-Now)
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        SMA Negeri 1 Semarang (2024-2021)
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        SMP Negeri 2 Semarang (2021-2018)
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
     </section>
       <!-- aboutme end -->

      <!-- footer begin -->
     <footer class="text-center p-5">
      <div>
        <a href="https://www.instagram.com/michl3669/?next=%2F"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
        <a href="https://wa.me/6285647915756"><i class= "bi bi-whatsapp h2 p-2 text-dark"></i></a>
      </div>
     </footer>
     <!-- footer end -->

    <!-- Tombol Back to Top -->
    <button
      id="backToTop"
      class="btn btn-danger rounded-circle position-fixed bottom-0 end-0 m-3 d-none"
    >
      <i class="bi bi-arrow-up" title="Back to Top"></i>
    </button>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
      function tampilWaktu(){
      const waktu = new Date();
      const tanggal = waktu.getDate();
      const bulan = waktu.getMonth();
      const tahun = waktu.getFullYear();
      const jam = waktu.getHours();
      const menit = waktu.getMinutes();
      const detik = waktu.getSeconds();

      const arrBulan = ["1", "2", "3", "4","5","6","7","8","9","10","11","12"];

      const tanggal_full = tanggal + "/" + arrBulan[bulan] + "/" + tahun;
      const jam_full = jam + ":" + menit + ":" + detik;
      
      document.getElementById("tanggal").innerHTML = tanggal_full;
      document.getElementById("jam").innerHTML = jam_full;
      }
      setInterval(tampilWaktu, 1000);
    </script>

    <script type="text/javascript"> 
    const backToTop = document.getElementById("backToTop");

    window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
        backToTop.classList.remove("d-none");
        backToTop.classList.add("d-block");
    } else {
        backToTop.classList.remove("d-block");
        backToTop.classList.add("d-none");
        }
    });
    backToTop.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
    </script>

    <script>
      const darkModeToggle = document.getElementById("dark-mode-toggle");

      const body = document.body;

      darkModeToggle.addEventListener
      ('click',() => {
          body.classList.toggle('dark-mode')
      })
        
    </script> 

  </body>
</html>
