<?php
  $inIndex = "goToId";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LahanParkir.com</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="source/css/styleIndex.css">
    <link rel="stylesheet" href="source/css/headernav.css">
  </head>
  <body>
    <?php require_once 'source/etc/headernav.php'; ?>
    <div id="home">
      <div class="shape"></div>
      <div class="slogan">
        <p>Cari tempat parkir untuk mobil ?</p>
        <p>Cari di bawah dan temukan tempat parkir terdekat :)</p>
        <form id="cariparkir" action="cari_lahan_parkir.php" method="get">
          <input class="form-control search" type="text" name="search" placeholder="Cari di sini..">
          <input class="form-control btn btn-primary" type="submit" name="cari" value="Cari">
        </form>
      </div>
    </div>
    <div id="cara-penggunaan">
      <h2 class="text-center"><strong>Bagaimana Cara Kerjanya ?</strong></h2>
      <div class="row satutiga">
        <div class="col-md-4 text-center">
          <span>1</span>
          <p><strong>Register dan Login</strong></p>
          <p>Anda tinggal Register dan Login melalui form yang telah tersedia di website ini.</p>
        </div>
        <div class="col-md-4 text-center">
          <span>2</span>
          <p><strong>Cari Lokasi Lahan Parkir</strong></p>
          <p>Anda bisa mencari lahan parkir yang tersedia pada menu search di halaman homepage atau langsung klik pada menu <strong><a href="cari_lahan_parkir.php">Cari Lahan Parkir</a></strong>.</p>
        </div>
        <div class="col-md-4 text-center">
          <span>3</span>
          <p><strong>Booking</strong></p>
          <p>Booking lahan parkir dengan mengisi semua data yang diminta pada form pemesanan lahan parkir yang tersedia lalu klik booking, setelah tombol booking diklik maka Anda akan mendapatkan kode booking di detail pemesanan dan simpan kode pemesanan untuk konfirmasi pembayaran</p>
        </div>
      </div>
      <div class="row empatlima">
        <div class="col-md-2"></div>
        <div class="col-md-4 text-center">
          <span>4</span>
          <p><strong>Bayar</strong></p>
          <p>Bayar melalui metode pembayaran yang telah disediakan oleh LahanParkir.com dengan aman</p>
        </div>
        <div class="col-md-4 text-center">
          <span>5</span>
          <p><strong>Selesai</strong></p>
          <p>Setelah 4 prosedur di atas telah selesai dilakukan, Anda dapat langsung memarkir kendaraan Anda :)</p>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
    <div id="tentang">
      <h2 class="text-center"><strong>Tentang LahanParkir.com</strong></h2><br>
      <div class="container">
        <p class="h4">LahanParkir.com adalah sebuah website yang menyediakan solusi terbaik untuk mencari lahan parkir di sekitar rumah Anda jika Anda kesulitan untuk memarkir mobil Anda. LahanParkir.com akan mencari jalan keluar untuk permasalahan di atas dengan mudah dan efisien.</p>
      </div>
    </div>
    <div id="kontak">
      <h2 class="text-center"><strong>Kontak Kami</strong></h2>
      <div class="text-center">
        <small>Kami selalu senang menerima masukan dari Anda</small>
      </div>
      <form id="formkontak"  action="" method="post">
        <div class="row">
          <div class="col-md-5">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="nohp" placeholder="No. HP" required>
          </div>
          <div class="col-md-7">
            <textarea name="pesan" rows="7" class="form-control" placeholder="Masukan Pesan Anda"></textarea>
          </div>
        </div>
        <input class="btn btn-primary" type="submit" name="kirim" value="Kirim Pesan">
      </form>
    </div>
    <div id="footer">
      <p class="text-center">&copy;2018 Hilih Budi Luhur</p>
    </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <script defer src="source/js/headernav.js"></script>
    <script type="text/javascript">
      // hover border
      // $(document).ready(function(){
      //   $('#navtoggle li').mouseover(function() {
      //     $(this).animate({ borderTopColor: "#0e7796" }, 'fast');
      //   });
      //   $('#navtoggle li').mouseout(function() {
      //     $(this).animate({ borderTopColor: "#fff" }, 'fast');
      //   });
      // });
    </script>
  </body>
</html>
