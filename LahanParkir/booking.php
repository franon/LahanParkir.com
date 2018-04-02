<?php
  session_start();
  if (isset($_POST['lanjut-ke-konfirmasi'])) {
    $_SESSION['booking'][0] = $_POST['isiDataKendaraan'];
  } else if(isset($_POST['uploadbukti'])) {
    $_SESSION['booking'][1] = $_POST['uploadbukti'];
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booking</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="source/css/headernav.css">
    <link rel="stylesheet" href="source/css/styleBooking.css">
  </head>
  <body>
    <?php require_once 'source/etc/headernav.php'; ?>
    <div class="container-booking">
      <div class="head-booking text-center">
        <div class="row">
          <div class="col-md-4 isi_data_kendaraan">
            <span><strong>Isi Data Kendaraan</strong></span>
            <span class="circle" id="isi_data_kendaraan">
              <i class="fas fa-circle color-circle"></i>
              <i class="fas fa-check-circle color-circle"></i>
            </span>
          </div>
          <div class="col-md-4 konfirmasi_pembayaran">
            <span><strong>Konfirmasi Pembayaran</strong></span>
            <span class="circle" id="konfirmasi_pembayaran">
              <i class="fas fa-circle color-circle"></i>
              <i class="fas fa-check-circle color-circle"></i>
            </span>
          </div>
          <div class="col-md-4 proses_pembayaran">
            <span><strong>Pembayaran Selesai</strong></span>
            <span class="circle" id="proses_pembayaran">
              <i class="fas fa-circle color-circle"></i>
              <i class="fas fa-check-circle color-circle"></i>
            </span>
          </div>
        </div>
      </div>
      <?php
       if(isset($_SESSION['booking'][1])) {
         ?>
         <br><br>
         <h2 class="text-center">Pembayaran Selesai</h2><br>
         <p class="text-center">Selamat Anda sudah menyelesaikan proses pembayaran.
         Sekarang anda sudah dapat memarkir kendaraan Anda, terimakasi telah menggunakan layanan kami :) </p>
         <?php
      } else if(isset($_SESSION['booking'][0])) {
        ?>
        <form id="formbooking" action="" method="post" enctype="multipart/form-data">
          <h2 class="text-center">Menunggu Pembayaran</h2>
          <div class="container-rincian-pemesanan text-center">
            <p>Mohon selesaikan pembayaran Anda sebelum tanggal 24 Juli 2018 19.49 WIB dengan kode pembayaran sebagai berikut.</p>
            <hr>
            <p class="h3"><strong>Kode Pembayaran</strong></p>
            <p class="h3"><strong>14045</strong></p>
            <hr>
            <p class="h4">Jumlah yang harus dibayar</p>
            <p class="h3">Rp.50.000</p>
            <p>Kode pembayaran akan <strong>otomatis</strong> dibatalkan apabila Anda belum melakukan pembayaran lebih dari 1 hari setelah <strong>Kode Pembayaran</strong> diberikan</p>
          </div>
          <br>
          <div class="form-group">
            <input class="form-control-file" type="file" name="pic" accept="image/*" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Mohon Upload bukti pembayaran pada Form Upload di Atas</small>
          </div>
          <div class="form-group">
            <input type="submit" name="uploadbukti" value="Upload Bukti Pembayaran" class="btn btn-primary">
          </div>

        </form>
        <?php
      } else {
      ?>
      <form id="formbooking" action="" method="post">
        <div class="form-group">
          <label for="date">Pilih Tanggal Parkir-nya</label>
          <input type="date" id="date" class="form-control" name="date">
        </div>
        <div class="form-group">
          <label for="lamaparkir">Lama Parkir (per bulan) : </label>
          <input type="number" class="form-control" value="1" name="lamaparkir" id="lamaparkir">
        </div>
        <div class="form-group">
          <label for="datekeluar">Tanggal Keluar Parkir</label>
          <input type="date" id="datekeluar" class="form-control" name="datekeluar" disabled>
        </div>
        <div class="form-group">
          <label for="merkkendaraan">Merk Kendaraan Anda : </label>
          <input type="text" class="form-control" name="merkkendaraan" id="merkkendaraan" value="">
        </div>
        <div class="form-group">
          <label for="nopolisi">Nomor Polisi Kendaraan Anda : </label>
          <input type="text" class="form-control" name="nopolisi" id="nopolisi" value="">
        </div>
        <div class="form-group">
          <label for="warnamobil">Warna Mobil Kendaraan Anda : </label>
          <input type="text" class="form-control" name="warnamobil" id="warnamobil" value="">
        </div>
        <div class="form-group">
          <input type="checkbox" class="form-check-input" id="eula" name="eula" value="fix">
          <label class="form-check-label" for="eula">Dengan ini saya telah membaca dan menyetujui Syarat dan Ketentuan serta Kebijakan</label>
        </div>
        <input type="hidden" name="isiDataKendaraan" value="sudah">
        <div class="form-group text-center ">
          <input type="submit" name="lanjut-ke-konfirmasi" class="btn btn-primary" value="Lanjutkan Pemesanan">
        </div>
      </form>
    <?php } ?>
    </div>
    <!-- datepicker dan Form-->
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <script defer src="source/js/headernav.js"></script>
    <script defer src="source/js/customformatdate.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      var waktusekarang = new Date();
      var nowtime = waktusekarang.customFormat("#YYYY#-#MM#-#DD#");
      var milisecond = waktusekarang.getTime();
      plusSebulan(milisecond);
      $("#date").val(nowtime);
      $('#date').change(function(){
          var inputDate = new Date(this.value);
          var milisecond = inputDate.getTime();
          console.log(milisecond);
          plusSebulan(milisecond);
      });
      $('#lamaparkir').change(function(){
          var thisval = this.value;
          if(thisval < 1) {
            $(this).val(1);
          }
          var valunya = $('#date').val();
          var inputDate = new Date(valunya);
          var milisecond = inputDate.getTime();
          plusSebulan(milisecond, thisval);
      });
    });
    var plusSebulan = function(milisecond, i = 1) {
      var minutes = 1000 * 60;
      var hours = minutes * 60;
      var days = hours * 24;
      var month = days * 30 * i;
      var plus = milisecond + month;
      var lamaparkir = new Date(plus);
      var lamaparkirstr = lamaparkir.customFormat("#YYYY#-#MM#-#DD#");
      $("#datekeluar").val(lamaparkirstr);
    }
    </script>
  </body>
</html>
