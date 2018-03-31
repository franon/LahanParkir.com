<?php
  $jenis = "";
  if (isset($_GET['r'])) {
    $r = $_GET['r'];
    if (isset($_GET['jenis'])) {
      $jenis = $_GET['jenis'];
    }
  } else {
    header("Location: sign.php?r=login");
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
          <div class="row container-form-signin">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form id="signin" action="index.html" method="post">
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
          <div class="row container-form-signin">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <form action="" method="post">
              <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username">
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
                <div class="row">
                  <div class="col-md-4">
                    <select class="form-control" name="provinsi">
                      <option value="">Provinsi</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="kabupaten">
                      <option value="">Kabupaten</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="kecamatan">
                      <option value="">Kecamatan</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <input class="form-control pass" type="password" name="password" placeholder="Password">
                <small class="show-password text-center" val="password"><label for="show-password">Show Password </label>
                <input id="show-password" type="checkbox" name="show-password"> </small>
              </div>
              <div class="form-group text-center">
                <input class="btn btn-primary" type="submit" name="signup" value="Daftar">
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
            <form id="signupP" action="index.html" method="post">
              <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username">
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
                <div class="row">
                  <div class="col-md-4">
                    <select class="form-control" name="provinsi">
                      <option value="">Provinsi</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="kabupaten">
                      <option value="">Kabupaten</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="kecamatan">
                      <option value="">Kecamatan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="no_ktp" placeholder="No. KTP">
              </div>
              <div class="form-group">
                <select class="form-control" name="daftarbank">
                  <option value="">Daftar Bank</option>
                  <option value="bca">BCA</option>
                  <option value="mandiri">MANDIRI</option>
                  <option value="bri">BRI</option>
                  <option value="bni">BNI</option>
                  <option value="cimbniaga">CIMB NIAGA</option>
                  <option value="mega">BANK MEGA</option>
                  <option value="bukopin">BANK BUKOPIN</option>
                  <option value="dki">BANK DKI</option>
                </select>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="no_rek" placeholder="No. Rekening">
              </div>
              <div class="form-group">
                <input class="form-control pass" type="password" name="password" placeholder="Password">
                <small class="show-password text-center val="password""><label for="show-password">Show Password </label>
                <input id="show-password" type="checkbox" name="show-password"> </small>
              </div>
              <div class="form-group text-center">
                <input class="btn btn-primary" type="submit" name="signup" value="Daftar">
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
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click', '.show-password', function(){
          var t = $("show-password").attr("val");
          console.log(t);
          if (t === "password") {
            $(".pas").attr("type", "text");
            $(this).attr("val", "unpass");
          } else if(t === "unpass") {
            $(".pas").attr("type", "password");
            $(this).attr("val", "password");
          }
        });
      });
    </script>
  </body>
</html>
