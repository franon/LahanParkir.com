<?php
  session_start();
  include 'db.php';
  $jenis = "";
  $pesan_error = "";
  if(isset($_SESSION['username'])) {
    header("Location: index.php");
  }
  if (isset($_GET['r'])) {
    $r = $_GET['r'];
    if (isset($_GET['jenis'])) {
      $jenis = $_GET['jenis'];
    }
  } else {
    header("Location: sign.php?r=login");
  }
  if(isset($_POST['signupuser'])) {
    include 'source/etc/UserAndPelapak.php';
    $username = $_POST['username'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kabupaten = $_POST['kabupaten'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $password = $_POST['password'];
    $valiUserDaftar = $uap->{'validasiUsername'}($username);
    $pesan_error = $uap->{'userDaftar'}($username, $full_name, $email, $no_hp, $alamat, $kabupaten, $kecamatan, $kelurahan, $password ,$valiUserDaftar[0]);
  } elseif (isset($_POST['signuppelapak'])) {
    include 'source/etc/UserAndPelapak.php';
    $username = $_POST['username'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kabupaten = $_POST['kabupaten'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $no_ktp = $_POST['no_ktp'];
    $daftarbank = $_POST['daftarbank'];
    $no_rek = $_POST['no_rek'];
    $nama_rek = $_POST['nama_rek'];
    $password = $_POST['password'];
    $validasi = $uap->{'validasiUsername'}($username);
    $pesan_error = $uap->{'pelapakDaftar'}($username, $full_name, $email, $no_hp, $alamat, $kabupaten, $kecamatan, $kelurahan, $no_ktp, $daftarbank, $no_rek, $nama_rek, $password, $validasi[0]);
  } elseif (isset($_POST['signin'])) {
    include 'source/etc/UserAndPelapak.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $valiUser = $uap->{'validasiUsername'}($username);
    $validasi = $valiUser[0];
    $tableUser = $valiUser[1];
    $columnUser = $valiUser[2];
    $pesan_error = $uap->{'login'}($username, $password, $validasi, $tableUser, $columnUser);
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Now</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="source/css/styleSign.css">
    <link rel="stylesheet" href="source/css/select2.min.css">
    <link rel="stylesheet" href="source/css/select2-bootstrap.min.css">
  </head>
  <body>
      <div class="sign-form">
        <div class="row sign-logo">
          <div class="col-md-3 text-center">
            <a href="../LahanParkir/">
              <strong>LahanParkir.com</strong>
            </a>
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-3 text-center">
            <a href="../LahanParkir/">
              <strong>Kembali ke HomePage</strong>
            </a>
          </div>
        </div>
        <!-- Top Sign -->
        <?php if ($r === "login"): ?>
          <h1 class="text-center">Login</h1>
          <small class="text-center">Sudah punya akun ? Silahkan login...</small>
          <?php
            if ($pesan_error) {
              echo '<div class="pesan_error text-center">';
                echo $pesan_error;
              echo '</div>';
            }
            ?>
          <div class="row container-form-signin">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form id="signin" action="" method="post">
                <div class="form-group">
                  <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input class="form-control pass" type="password" name="password" placeholder="Password">
                  <small class="show-password text-center" val="password"><label for="show-password">Show Password </label>
                  <input id="show-password" type="checkbox" name="show-password"> </small>
                </div>
                <div class="form-group text-center">
                  <input class="btn btn-primary" type="submit" name="signin" value="Login">
                </div>
              </form>
            </div>
            <div class="col-md-3"></div>
          </div>
          <br><br>
          <div class="text-center row">
            <div class="col-md-3"></div>
            <a class="col-md-3" href="lupa_password.php"><small>Lupa Password ?</small></a>
            <a class="col-md-3"  href="sign.php?r=daftar"><small>Belum Daftar ? Klik di sini ..</small></a>
            <div class="col-md-3"></div>
          </div>
        <?php endif; ?>
        <?php if ($r === "daftar" && $jenis === "user"): ?>
          <h1 class="text-center">Daftar</h1>
          <small class="text-center">Daftar sekarang dan jadilah member LahanParkir.com !</small>
            <?php
              if ($pesan_error) {
                echo '<div class="pesan_error text-center">';
                echo $pesan_error;
                echo '</div>';
              }
            ?>
          <div class="row container-form-signin">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <form action="" method="post">
              <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="full_name" placeholder="Nama Lengkap" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="no_hp" placeholder="No.HP" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="alamat" placeholder="Alamat (Nama Jalan)" required>
              </div>
              <div class="form-group">
                <select class="form-control select2 select2up" id="kabupaten" name="kabupaten" required>
                  <option value="">Kota/Kabupaten</option>
                  <?php
                    $stmt = $mysqli->prepare("SELECT id_kab, id_prov, nama FROM kabupaten_daerah ORDER BY nama");
                    $stmt->execute();
                    $stmt->bind_result($id_kab, $id_prov, $nama);
                    while($stmt->fetch()) {
                      echo "<option value='".$id_kab."' prov='".$id_prov."'>$nama</option>";
                    }
                    $stmt->close();
                   ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control select2 select2up" id="kecamatan" name="kecamatan" required>
                  <option value="">Kecamatan</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control select2" id="kelurahan" name="kelurahan" required>
                  <option value="">Kelurahan</option>
                </select>
              </div>

              <div class="form-group">
                <input class="form-control pass" type="password" name="password" placeholder="Password" required>
                <small class="show-password text-center" val="password"><label for="show-password">Show Password </label>
                <input id="show-password" type="checkbox" name="show-password"> </small>
              </div>
              <div class="form-group text-center">
                <input class="btn btn-primary" type="submit" name="signupuser" value="Daftar">
              </div>
            </form>
            </div>
            <div class="col-md-3"></div>
          </div>
          <br>
          <div class="text-center row">
            <div class="col-md-3"></div>
            <a class="col-md-3" href="sign.php?r=daftar"><small>Kembali ke daftar sebagai</small></a>
            <a class="col-md-3"  href="sign.php?r=login"><small>Sudah punya akun ? Login di sini ..</small></a>
            <div class="col-md-3"></div>
          </div>
        <?php endif; ?>
        <?php if ($r === "daftar" && $jenis === "pemiliklapak"): ?>
          <h1 class="text-center">Daftar</h1>
          <small class="text-center">Daftar sekarang dan nikmati kemudahan pelayanan dari Kami !</small>
          <div class="row container-form-signin">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <form id="signupP" action="" method="post">
              <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="full_name" placeholder="Nama Lengkap" required>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="no_hp" placeholder="No.HP">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="alamat" placeholder="Alamat (Nama Jalan)">
              </div>
              <div class="form-group">
                <select class="form-control select2 select2up" id="kabupaten" name="kabupaten">
                  <option value="">Kabupaten</option>
                  <?php
                    $stmt = $mysqli->prepare("SELECT id_kab, id_prov, nama FROM kabupaten_daerah ORDER BY nama");
                    $stmt->execute();
                    $stmt->bind_result($id_kab, $id_prov, $nama);
                    while($stmt->fetch()) {
                      echo "<option value='".$id_kab."' prov='".$id_prov."'>$nama</option>";
                    }
                    $stmt->close();
                   ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control select2 select2up" id="kecamatan" name="kecamatan">
                  <option value="0" class="kecselected">Kecamatan</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control select2" id="kelurahan" name="kelurahan">
                  <option value="0"  class="kelselected">Kelurahan</option>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" type="number" name="no_ktp" placeholder="No. KTP">
              </div>
              <div class="form-group">
                <select class="form-control" name="daftarbank">
                  <option value="">Daftar Bank</option>
                  <option value="bca">BCA</option>
                  <option value="mandiri">MANDIRI</option>
                  <option value="bri">BRI</option>
                  <option value="cimbniaga">CIMB NIAGA</option>
                  <option value="mega">BANK MEGA</option>
                  <option value="bukopin">BANK BUKOPIN</option>
                  <option value="dki">BANK DKI</option>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" type="number" name="no_rek" placeholder="No. Rekening">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="nama_rek" placeholder="Nama Rekening">
              </div>
              <div class="form-group">
                <input class="form-control pass" type="password" name="password" placeholder="Password">
                <small class="show-password text-center" val="password"><label for="show-password">Show Password </label>
                <input id="show-password" type="checkbox" name="show-password"> </small>
              </div>
              <div class="form-group text-center">
                <input class="btn btn-primary" type="submit" name="signuppelapak" value="Daftar">
              </div>
             </form>
           </div>
           <div class="col-md-3"></div>
         </div>
         <div class="text-center row">
           <div class="col-md-3"></div>
           <a class="col-md-3" href="sign.php?r=daftar"><small>Kembali ke daftar sebagai</small></a>
           <a class="col-md-3"  href="sign.php?r=login"><small>Sudah punya akun ? Login di sini ..</small></a>
           <div class="col-md-3"></div>
         </div>
        <?php endif; ?>
        <?php if ($r === "daftar" && ($jenis !== "user" && $jenis !== "pemiliklapak")): ?>
          <h1 class="text-center">Daftar</h1>
          <small class="text-center">Anda Mau Mendaftar Sebagai ? </small>
          <div class="row container-form-signin">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form id="signin" action="" method="get">
                <div class="form-group row text-center">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <input id="pemiliklapak" type="radio" name="jenis" value="pemiliklapak" checked>
                    <label for="pemiliklapak">Pemilik Lapak</label>
                  </div>
                  <div class="col-md-5">
                    <input id="user" type="radio" name="jenis" value="user">
                    <label for="user">User</label>
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <div class="form-group text-center">
                  <input type="hidden" name="r" value="daftar">
                  <input class="btn btn-primary" type="submit" name="lanjutkan" value="Lanjutkan">
                </div>
              </form>
            </div>
            <div class="col-md-3"></div>
          </div>
          <br>
          <div class="text-center row">
            <div class="col-md-3"></div>
            <a class="col-md-3" href="lupa_password.php"><small>Lupa Password ?</small></a>
            <a class="col-md-3"  href="sign.php?r=login"><small>Sudah punya akun ? Login di sini ..</small></a>
            <div class="col-md-3"></div>
          </div>
        <?php endif; ?>
        <!-- Bottom Sign -->
      </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <script src="source/js/select2.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click', '#show-password', function(){
          var t = $("small.show-password").attr("val");
          console.log(t);
          if (t === "password") {
            $("input.form-control.pass").attr("type", "text");
            $("small.show-password").attr("val", "unpass");
          } else if(t === "unpass") {
            $("input.form-control.pass").attr("type", "password");
            $("small.show-password").attr("val", "password");
          }
        });
      });
    </script>
    <script type="text/javascript">
    $(".select2").select2({
      allowClear:true,
      placeholder: 'Position'
    });
    </script>
    <script type="text/javascript">
    $(document).on('change', '#kabupaten', function(){
        $("#s2id_kecamatan .select2-chosen").empty();
        $("#s2id_kecamatan .select2-chosen").text("Kecamatan");
        $("#s2id_kelurahan .select2-chosen").empty();
        $("#s2id_kelurahan .select2-chosen").text("Kelurahan");
    })
    $(document).on('change', '#kecamatan', function(){
      $("#s2id_kelurahan .select2-chosen").empty();
      $("#s2id_kelurahan .select2-chosen").text("Kelurahan");
    })
    // ajax
    $(document).ready(function(){

      $(".select2").change(function(){
          var value = $(this).val();
          var name = $(this).attr("id");
          var place = "";
          if(name == "kabupaten") {
            place = "kecamatan";
          } else if(name == "kecamatan") {
            place = "kelurahan";
          }
          $.ajax({    //create an ajax request to display.php
          type: "GET",
          url: "source/etc/selectTempatSign.php?r="+value+"&name="+name+"&place="+place,
          dataType: "html",   //expect html to be returned
          success: function(response){
                      $("#"+place).html(response);
                  }
          });
      });
    });
    // close message error
    $(document).ready(function(){
      $(".pesan_error").click(function(){
        $(this).fadeOut(800);
      });
    })
    if ($('.pesan_error').length) {
        setTimeout(function(){
          $('.pesan_error').fadeOut(800);
        }, 2000);
    }
    </script>
  </body>
</html>
