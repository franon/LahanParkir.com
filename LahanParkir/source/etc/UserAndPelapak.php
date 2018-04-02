<?php
  class UserAndPelapak {
    function __construct() {
    }
    function selectDP($uname, $table, $columnName) {
      include 'db.php';
      $stmt = $mysqli->prepare("SELECT dp FROM $table WHERE $columnName = ?");
      $stmt->bind_param("s", $uname);
      $stmt->execute();
      $stmt->bind_result($dp);
      $stmt->fetch();
      $stmt->close();
      return $dp;
    }
    function validasiUsername($uname_f_cek) {
      if(file_exists('db.php')) {
        include 'db.php';
      } else {
        include '../../db.php';                
      }
      for ($i=0; $i < 3; $i++) {
        $validasi[$i] = 0;
      }
      $num_rows = 0;
      $stmt = $mysqli->prepare("SELECT username FROM user WHERE username = ?");
      $stmt->bind_param("s", $uname_f_cek);
      $stmt->execute();
      $stmt->store_result();
      $num_rows = $stmt->num_rows;
      $stmt->bind_result($uname);
      $stmt->close();
      if(!$num_rows) {
        $stmt = $mysqli->prepare("SELECT username_pemilik FROM pemilik_lahan WHERE username_pemilik = ?");
        $stmt->bind_param("s", $uname_f_cek);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->bind_result($uname);
        $stmt->close();
        if($num_rows) {
          $validasi[0] = 1;
          $validasi[1] = "pemilik_lahan"; // Table
          $validasi[2] = "username_pemilik"; // Column
        }
      } else {
        $validasi[0] = 1; // Validasi
        $validasi[1] = "user"; // Table
        $validasi[2] = "username"; // Column
      }
      return $validasi;
    }
    function pelapakDaftar($username, $full_name, $email, $no_hp, $alamat, $kabupaten, $kecamatan, $kelurahan, $no_ktp, $daftarbank, $no_rek, $nama_rek, $password, $validasi) {
      include 'db.php';
      if(!$validasi) {
        $options = [
          'cost' => 13
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        $dp = "source/img/dp_dummy.png";
        $redirect = 0;
        $stmt = $mysqli->prepare("SELECT DISTINCT(id_prov) FROM kabupaten_daerah WHERE id_kab = ?");
        $stmt->bind_param("s", $kabupaten);
        $stmt->execute();
        $stmt->bind_result($id_prov);
        $stmt->fetch();
        $stmt->close();

        $stmt = $mysqli->prepare("INSERT INTO pemilik_lahan (username_pemilik, full_name, password, alamat, id_kab, id_kec, id_kel, id_prov, no_ktp, no_rek, nama_rek, no_hp, email, jenis_bank, dp) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssss", $username, $full_name, $password, $alamat, $kabupaten, $kecamatan, $kelurahan, $id_prov, $no_ktp, $no_rek, $nama_rek, $no_hp, $email, $daftarbank, $dp);
        if ($stmt->execute()) {
          $redirect = 1;
        }
        $stmt->close();
        if ($redirect) {
          session_start();
          $_SESSION['username'] = $username;
          if (!file_exists("userdata/user/$username/dp/")) {
            mkdir("userdata/pemilik_lahan/$username/dp/", 0777, true);
            mkdir("userdata/pemilik_lahan/$username/lahan/", 0777, true);
          }
          return header("Location: index.php");
        }
      } else {
        return "Daftar gagal Username Sudah Terdaftar";
      }
    }
    function userDaftar($username, $full_name, $email, $no_hp, $alamat, $kabupaten, $kecamatan, $kelurahan, $password, $validasi) {
      include 'db.php';
      if(!$validasi) {
        $options = [
          'cost' => 13
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        $dp = "source/img/dp_dummy.png";
        $redirect = 0;
        $stmt = $mysqli->prepare("SELECT DISTINCT(id_prov) FROM kabupaten_daerah WHERE id_kab = ?");
        $stmt->bind_param("s", $kabupaten);
        $stmt->execute();
        $stmt->bind_result($id_prov);
        $stmt->fetch();
        $stmt->close();

        $stmt = $mysqli->prepare("INSERT INTO user (username, full_name, password, alamat, id_kab, id_kec, id_kel, id_prov, no_hp, email, dp) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $username, $full_name, $password, $alamat, $kabupaten, $kecamatan, $kelurahan, $id_prov, $no_hp, $email, $dp);
        if ($stmt->execute()) {
          $redirect = 1;
        }
        $stmt->close();
        if ($redirect) {
          $_SESSION['username'] = $username;
          if (!file_exists("userdata/user/$username/dp/")) {
            mkdir("userdata/user/$username/dp/", 0777, true);
          }
          return header("Location: index.php");
        }
      } else {
        return "Daftar gagal Username Sudah Terdaftar";
      }
    }
    function login($username, $password, $validasi, $tableUser, $columnUser) {
      include 'db.php';
      if ($validasi) {
        $stmt = $mysqli->prepare("SELECT password FROM $tableUser WHERE $columnUser = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($passwordhash);
        $stmt->fetch();
        $stmt->close();
        if(password_verify($password, $passwordhash)) {
          session_start();
          $_SESSION['username'] = $username;
          header("Location: index.php");
        } else {
          return "Maaf Password Anda Salah";
        }
      } else {
        return "Username Tidak Terdaftar";
      }
    }
  }
  $uap = new UserAndPelapak;
 ?>
