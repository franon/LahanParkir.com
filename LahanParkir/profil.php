<?php
  session_start();
  include 'db.php';
  $p = "";
  if (!isset($_GET['r'])) {
    header("Location: index.php");
  } else if(isset($_GET['r'])){
    $uname_org_sini = $_GET['r'];
    $username = $_GET['r'];
    include 'source/etc/UserAndPelapak.php';
    $validasiInProfil = $uap->{'validasiUsername'}($uname_org_sini);
    if(!$validasiInProfil[0]) {
      header("Location: index.php");
    }
    $foto_profil = $uap->{'selectDP'}($uname_org_sini, $validasiInProfil[1], $validasiInProfil[2]);

    // get user

    $query = "SELECT u.alamat, u.no_hp, u.full_name, u.email, kab.nama, kec.nama, kel.nama, prov.nama FROM ".$validasiInProfil[1]." u INNER JOIN kabupaten_daerah kab ON u.id_kab = kab.id_kab INNER JOIN  kecamatan_daerah kec ON u.id_kec = kec.id_kec INNER JOIN kelurahan_daerah kel ON u.id_kel = kel.id_kel INNER JOIN provinsi_daerah prov ON u.id_prov = prov.id_prov && u.".$validasiInProfil[2]." = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $uname_org_sini);
    $stmt->execute();
    $stmt->bind_result($uAlamat, $uNoHP, $uFullName, $uEmail, $kabNama, $kecNama, $kelNama, $provNama);
    $stmt->fetch();
    $stmt->close();

    if (isset($_GET['p']) && ($_SESSION['username'] == $uname_org_sini)) {
      $p = $_GET['p'];
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LahanParkir.com</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="source/css/headernav.css">
    <link rel="stylesheet" href="source/css/styleProfil.css">
  </head>
  <body>
    <?php require_once 'source/etc/headernav.php'; ?>
    <div class="pesan">
    </div>
    <div class="row padding-dikit">
      <div class="col-md-3 kiri">
        <div class="dp">
          <img src="<?php echo $foto_profil; ?>" alt="<?php echo $uname_org_sini ?>" class="img-fluid dp-in-profil">
        </div>
        <div class="nama"><br>
          <p class="h2 text-center"><?php echo $uFullName ?></p>
        </div>
        <p class="text-center"><small>Last logout 1 minute ago</small></p>
      </div>
      <div class="col-md-9 kanan">
        <div class="header-kanan">
          <div class="row text-center">
            <div class="col-md-3">
              <?php if ($validasiInProfil[1] == "pemilik_lahan") {
                  ?>
                  <span class="border-bottom"><strong id="lahan-saya-click">Lahan Saya</strong></span>
                  <?php
              } ?>
            </div>
            <div class="col-md-3">
              <span class="border-bottom"><strong id="info-kontak-click">Info Kontak</strong></span>
            </div>
            <div class="col-md-3">
              <?php if($username !== $uname_org_sini) {
                  echo '<span class="border-bottom"><strong id="kirim-pesan-click">Kirim Pesan</strong></span>';
              } else if(isset($_SESSION['username'])) {
                 echo '<span class="border-bottom"><strong id="pengaturan-click">Pengaturan</strong></span>';
              } ?>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
        <div class="info-kontak">
          <p class="h4"><strong>Info Kontak</strong></p>
          <hr>
          <p>
            <div class="row">
              <div class="col-md-3">
                <span>Nama</span> :
              </div>
              <div class="col-md-9">
                <?php echo $uFullName ?>
              </div>
            </div>
          </p>
          <p>
            <div class="row">
              <div class="col-md-3">
                <span>Alamat</span> :
              </div>
              <div class="col-md-9">
                <?php echo "$uAlamat, Kelurahan $kelNama, Kecamatan $kecNama, ".ucwords(strtolower($kabNama)); ?>
              </div>
            </div>
          </p>
          <p>
            <div class="row">
              <div class="col-md-3">
                <span>Email</span> :
              </div>
              <div class="col-md-9">
                <?php echo $uEmail ?>
              </div>
            </div>
          </p>
          <p>
            <div class="row">
              <div class="col-md-3">
                <span>No. HP</span> :
              </div>
              <div class="col-md-9">
                <?php echo $uNoHP ?>
              </div>
            </div>
          </p>
        </div>
        <br>
        <?php if ($uname_org_sini !== $username) {
          ?>
          <div class="kirim-pesan">
            <div class="container-kirpes">
              <div class="top-kirpes">
                <img src="<?php echo $foto_profil ?>" alt="<?php echo $username ?>" class="img-fluid dp-in-profil-chat">
              </div>
              <div class="window-kirpes">
              </div>
              <div class="bottom-kirpes">
                <div class="form-group">
                  <input type="text" class="form-control" id="text-send" name="text-send" placeholder="Ketik Pesan Disini..">
                  <input type="submit" name="kirim_pesan" value="Kirim" id="btn-kirim-pesan" class="btn btn-primary btn-send">
                </div>
              </div>
            </div>
          </div>
          <?php
        }?>
        <div class="pengaturan">
          <div class="container-pengaturan">
            <p class="h4"><strong>Pengaturan</strong></p>
            <hr>
            <p>
              <div class="pengaturan_ganti_sesuatu_full_nameEdit">
                <div class="row">
                  <div class="col-md-3">
                    <span><strong>Nama Lengkap</strong></span> :
                  </div>
                  <div class="col-md-8">
                    <?php echo $uFullName ?>
                  </div>
                  <div class="col-md-1">
                    <span class="pengaturan_ganti_sesuatu" id="full_nameEdit"><i class="fas fa-cog"></i></span>
                  </div>
                </div><br>
                <div class="full_nameEdit">
                  <div class="row">
                      <div class="col-md-3">
                        <span><strong>Ganti Nama</strong></span> :
                      </div>
                      <div class="col-md-7">
                        <input type="text" name="full_name" class="form-control change_name_inp" value="" placeholder="Ganti Nama Disini">
                      </div>
                      <div class="col-md-2">
                        <input class="btn btn-primary change_name_btn" type="submit" name="ganti" val="full_name" value="Ganti">
                      </div>
                  </div>
                </div>
              </div>
            </p>
            <p>
              <div class="pengaturan_ganti_sesuatu_alamat_Edit">
                <div class="row">
                  <div class="col-md-3">
                    <span><strong>Alamat</strong></span> :
                  </div>
                  <div class="col-md-8">
                    <?php echo "$uAlamat, Kelurahan $kelNama, Kecamatan $kecNama, ".ucwords(strtolower($kabNama)); ?>
                  </div>
                  <div class="col-md-1">
                    <span class="pengaturan_ganti_sesuatu" id="alamat_Edit"><i class="fas fa-cog"></i></span>
                  </div>
                </div><br>
                <div class="alamat_Edit">
                  <div class="row">
                      <div class="col-md-3">
                        <span><strong>Ganti Alamat</strong></span> :
                      </div>
                      <div class="col-md-7">
                        <textarea name="alamat" rows="8" cols="80" placeholder="Ganti Alamat Disini" class="form-control change-alamat-inp"></textarea>
                          <br>
                          <?php include 'source/etc/alamat_L.php'; ?>
                        <input class="btn btn-primary change-alamat-btn" type="submit" name="ganti" val="alamat" value="Ganti">
                      </div>
                  </div>
                </div>
              </div>
            </p>
            <p>
              <div class="pengaturan_ganti_sesuatu_email_Edit">
                <div class="row">
                  <div class="col-md-3">
                    <span><strong>Email</strong></span> :
                  </div>
                  <div class="col-md-8">
                    <?php echo $uEmail ?>
                  </div>
                  <div class="col-md-1">
                    <span class="pengaturan_ganti_sesuatu" id="email_Edit"><i class="fas fa-cog"></i></span>
                  </div>
                </div>
                <br>
                <div class="email_Edit">
                  <div class="row">
                      <div class="col-md-3">
                        <span><strong>Ganti Email</strong></span> :
                      </div>
                      <div class="col-md-7">
                        <input type="email" name="email" class="form-control change-email-inp" value="" placeholder="Ganti Email Disini">
                      </div>
                      <div class="col-md-2">
                        <input class="btn btn-primary change-email-btn" type="submit" name="ganti" val="email" value="Ganti">
                      </div>
                  </div>
                </div>
              </div>
            </p>
            <p>
              <div class="pengaturan_ganti_sesuatu_nohp_Edit">
                <div class="row">
                  <div class="col-md-3">
                    <span><strong>No. HP</strong></span> :
                  </div>
                  <div class="col-md-8">
                    <?php echo $uNoHP ?>
                  </div>
                  <div class="col-md-1">
                    <span class="pengaturan_ganti_sesuatu" id="nohp_Edit"><i class="fas fa-cog"></i></span>
                  </div>
                </div>
                <br>
                <div class="nohp_Edit">
                  <div class="row">
                      <div class="col-md-3">
                        <span><strong>Ganti No. HP</strong></span> :
                      </div>
                      <div class="col-md-7">
                        <input type="text" name="no_hp" class="form-control change-nohp-inp" value="" placeholder="Ganti No. HP Disini">
                      </div>
                      <div class="col-md-2">
                        <input class="btn btn-primary change-nohp-inp" type="submit" name="ganti" val="no_hp" value="Ganti">
                      </div>
                  </div>
                </div>
              </div>
            </p>
            <p>
              <div class="pengaturan_ganti_sesuatu_password_Edit">
                <div class="row">
                  <div class="col-md-3">
                    <span><strong>Password</strong></span> :
                  </div>
                  <div class="col-md-8">
                    ****************
                  </div>
                  <div class="col-md-1">
                    <span class="pengaturan_ganti_sesuatu" id="password_Edit"><i class="fas fa-cog"></i></span>
                  </div>
                </div>
                <br>
                <div class="password_Edit">
                  <div class="row password_Edit">
                      <div class="col-md-3">
                        <span><strong>Ganti Password</strong></span> :
                      </div>
                      <div class="col-md-7">
                        <br>
                        <input type="password" name="password" class="form-control change-pass-inp" value="" placeholder="Ganti Password Disini">
                        <br>
                        <input type="password" name="password-repeat" class="form-control change-pass-inp2" value="" placeholder="Ulangi Password Anda">
                      </div>
                      <br>
                      <div class="col-md-2">
                        <input class="btn btn-primary change-pass-btn" type="submit" name="ganti" val="password" value="Ganti">
                      </div>
                  </div>
                </div>
              </div>
            </p>
          </div>
        </div>
      </div>
    </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <script defer src="source/js/headernav.js"></script>
    <script defer src="source/js/userSettings.js"></script>

    <script type="text/javascript">
        // $(".info-kontak").hide();
        // $('.kirim-pesan').show();
        $(document).on('click', '#kirim-pesan-click', function(){
          $(".info-kontak").fadeOut();
          $('.pengaturan').fadeOut();
          setTimeout(function(){
            $('.kirim-pesan').fadeIn();
          }, 800);
        });

        $(document).on('click', '#info-kontak-click', function(){
          $(".kirim-pesan").fadeOut();
          $('.pengaturan').fadeOut();
          setTimeout(function(){
            $('.info-kontak').fadeIn();
          }, 800);
        });
        $(document).on('click', '#pengaturan-click', function(){
          $(".info-kontak").fadeOut();
          $(".kirim-pesan").fadeOut();
          setTimeout(function(){
            $('.pengaturan').fadeIn();
          }, 800);
        });
        // 03-04-2018
        var p = '<?php echo $p ?>';
        if (p == "pengaturan") {
          $(".info-kontak").fadeOut();
          $(".kirim-pesan").fadeOut();
          $('.pengaturan').fadeIn();          
        }
    </script>
    <!-- send chat -->
    <script type="text/javascript">
      var IntoChat = function(user, usersini, val = "") {
        $.ajax({
        type: "GET",
        url: "source/etc/chatting.php?r="+val+"&u="+user+"&uos="+usersini,
        dataType: "html",
        success: function(response){
                    $(".window-kirpes").html(response);
                  }
        });
      }
      $(document).on('keypress', '#text-send', function(e){
        if (e.keyCode === 13) {
          var val = this.value;
          var user = '<?php echo $username ?>';
          var usersini = '<?php echo $uname_org_sini ?>';
          IntoChat(user, usersini, val);
          $(this).val("");
          $(".window-kirpes").animate({ scrollTop: $(".window-kirpes").height()*$(".window-kirpes").length*2 }, 400);
        }
      });
      $(document).on('click', '#btn-kirim-pesan', function(){
        var user = '<?php echo $username ?>';
        var usersini = '<?php echo $uname_org_sini ?>';
        var val = $("#text-send").val();
        IntoChat(user, usersini, val);
        $("#text-send").val("");
        $(".window-kirpes").animate({ scrollTop: $(".window-kirpes").height()*$(".window-kirpes").length*2 }, 400);
      });
      $(document).ready(function(){
        setInterval(function(){
          var user = '<?php echo $username ?>';
          var usersini = '<?php echo $uname_org_sini ?>';
          IntoChat(user, usersini);
        }, 3000);
      });
    </script>
    <!-- pengaturan -->
    <script type="text/javascript">
      $(document).ready(function(){
        $(".pengaturan_ganti_sesuatu").click(function(){
          var a = $(this).attr("id");
          var c = $(".pengaturan_ganti_sesuatu_"+a).attr("click");
          if(c == undefined || c == "") {
            $(".pengaturan_ganti_sesuatu_"+a).attr("click", "clicked");
            $(".pengaturan_ganti_sesuatu_"+a).css({"background-color":"#ddd", "padding": "2vw"});
          } else {
            $(".pengaturan_ganti_sesuatu_"+a).attr("click", "");
            setTimeout(function(){
              $(".pengaturan_ganti_sesuatu_"+a).css({"background-color":"", "padding": ""});
            }, 500);
          }
          $('.'+a).fadeToggle();
        });
      });
    </script>
    <script type="text/javascript">
    var sesUsername = "";
    <?php
      if (isset($_SESSION['username'])) {
        ?>
        sesUsername = '<?php echo $_SESSION['username'] ?>';
        <?php
      }
     ?>
     if(sesUsername !== "") {
       // jalankan function setting profil
       var fungsiSettings = function(username, dataInput, isPassword = "anything", dataPassRepeat = "", kabupaten = "", kecamatan = "", kelurahan = "") {
         $.ajax({
         url: "source/etc/userSettings.php",
         method: "POST",
         data: {username:username, dataInput:dataInput, dataPassRepeat:dataPassRepeat, isPassword:isPassword, kabupaten:kabupaten, kecamatan:kecamatan, kelurahan:kelurahan},  //dataPassRepeat == succes ????
         dataType: "html",
         success: function(response){
                      if(response == "success") {
                        alert("Pengaturan Berhasil di Ubah");

                      } else {
                        alert("Error, Pengaturan Gagal di Ubah");
                      }
                   }
         });
       }
       $(document).on('click', ".pengaturan input[name='ganti']", function(){
         var a = $(this).attr("val"); // val == selector class input
         var b = $("input[name='"+a+"'], textarea[name='"+a+"']").val(); // isi nilai input atau textarea
         if (a == "password") {
           c = $("input[name='"+a+"-repeat']").val(); // isi nilai input khusus password-repeat
           // password
           fungsiSettings(sesUsername, b, a, c);
         } else if(a == "alamat"){
           var kabupaten = $("select[name='kabupaten']").val();
           var kecamatan = $("select[name='kecamatan']").val();
           var kelurahan = $("select[name='kelurahan']").val();
           fungsiSettings(sesUsername, b, a, "", kabupaten, kecamatan, kelurahan);
         } else {
           // anything
           fungsiSettings(sesUsername, b, a);
         }
       });

     }
    </script>
  </body>
</html>
