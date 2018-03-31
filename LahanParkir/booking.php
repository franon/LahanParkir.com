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
          <div class="col-md-3 isi_data_kendaraan">
            <span><strong>Isi Data Kendaraan</strong></span>
            <span class="circle" id="isi_data_kendaraan">
              <i class="fas fa-circle color-circle"></i>
              <i class="fas fa-check-circle color-circle"></i>
            </span>
          </div>
          <div class="col-md-3 rincian_pemesanan">
            <span><strong>Rincian Pemesanan</strong></span>
            <span class="circle" id="rincian_pemesanan">
              <i class="fas fa-circle color-circle"></i>
              <i class="fas fa-check-circle color-circle"></i>
            </span>
          </div>
          <div class="col-md-3 konfirmasi_pembayaran">
            <span><strong>Konfirmasi Pembayaran</strong></span>
            <span class="circle" id="konfirmasi_pembayaran">
              <i class="fas fa-circle color-circle"></i>
              <i class="fas fa-check-circle color-circle"></i>
            </span>
          </div>
          <div class="col-md-3 proses_pembayaran">
            <span><strong>Proses Pembayaran</strong></span>
            <span class="circle" id="proses_pembayaran">
              <i class="fas fa-circle color-circle"></i>
              <i class="fas fa-check-circle color-circle"></i>
            </span>
          </div>
        </div>
      </div>
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
        <div class="form-group text-center ">
          <input type="button" name="btn-lanjutkan" class="btn btn-primary" value="Lanjutkan Pemesanan">
        </div>
      </form>
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
