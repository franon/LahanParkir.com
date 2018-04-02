<?php
  include '../../db.php';
  include 'UserAndPelapak.php';
  $username = "";
  $isPassword = "";
  $dataInput = "";
  $dataPassRepeat = "";
  $kabupaten = "";
  $kecamatan = "";
  $kelurahan = "";
  $pesan_err = ""; // pesan_err
  // start inisialitation $_POST
  if(isset($_POST['username'])) {
    $username = $_POST['username'];
  }

  if(isset($_POST['dataInput'])) {
    $dataInput = $_POST['dataInput'];
  }

  if(isset($_POST['dataPassRepeat'])) {
    $dataPassRepeat = $_POST['dataPassRepeat'];
  }

  if(isset($_POST['isPassword'])) {
    $isPassword = $_POST['isPassword'];
  }

  if(isset($_POST['kabupaten'])) {
    $kabupaten = $_POST['kabupaten'];
  }
  if(isset($_POST['kecamatan'])) {
    $kecamatan = $_POST['kecamatan'];
  }
  if(isset($_POST['kelurahan'])) {
    $kelurahan = $_POST['kelurahan'];
  }
  // end inisialitation $_POST

  // validasi username
  $validasi = $uap->{'validasiUsername'}($username);
  if (!$validasi[0]) {
    header("Location: profil.php");
  }
  // check input type isPassword or Anything ?
  if($isPassword == "password") {
    if($dataInput !== $dataPassRepeat) {
      $pesan_err .= "<p>Maaf Password tidak sesuai, mohon ulangi kembali</p>";
    } else {
      $options = [
        'cost' => 13
      ];
      $password = password_hash($dataInput, PASSWORD_BCRYPT, $options);
      $query = "UPDATE ".$validasi[1]." SET password = ? WHERE ".$validasi[2]." = ?";
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param("ss", $password, $username);
      $stmt->execute();
      $affected_rows = $stmt->affected_rows;
      $stmt->close();
      if ($affected_rows) {
        $pesan_err = "success";
      } else {
        $pesan_err = "<p>Terjadi Kesalahan, Data Gagal diubah</p>";
      }
    }
  } else if($isPassword == "alamat") {
    $stmt = $mysqli->prepare("SELECT DISTINCT(id_prov) FROM kabupaten_daerah WHERE id_kab = ?");
    $stmt->bind_param("s", $kabupaten);
    $stmt->execute();
    $stmt->bind_result($id_prov);
    $stmt->fetch();
    $stmt->close();
    $query = "UPDATE ".$validasi[1]." SET ".$isPassword." = ?, id_prov = ?, id_kab = ?, id_kec = ?, id_kel = ? WHERE ".$validasi[2]." = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssss", $dataInput, $id_prov, $kabupaten, $kecamatan, $kelurahan ,$username);
    $stmt->execute();
    $affected_rows = $stmt->affected_rows;
    $stmt->close();
    if ($affected_rows) {
      $pesan_err = "success";
    } else {
      $pesan_err = "<p>Terjadi Kesalahan, Data Gagal diubah</p>";
    }
  } else {
    $query = "UPDATE ".$validasi[1]." SET ".$isPassword." = ? WHERE ".$validasi[2]." = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $dataInput, $username);
    $stmt->execute();
    $affected_rows = $stmt->affected_rows;
    $stmt->close();
    if ($affected_rows) {
      $pesan_err = "success";
    } else {
      $pesan_err = "<p>Terjadi Kesalahan, Data Gagal diubah</p>";
    }
  }
  echo $pesan_err;

 ?>
