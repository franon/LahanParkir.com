<?php
    require_once '../../db.php';
  if(isset($_GET['r']) && isset($_GET['name'])) {
    $name = $_GET['name'];
    $r = $_GET['r'];
    $place = $_GET['place'];
    echo "<option value=''>".ucwords($place)."</option>";
    if($name == "kabupaten") {
      $stmt = $mysqli->prepare("SELECT id_kec, nama FROM kecamatan_daerah WHERE id_kab = ? ORDER BY nama");
    } else if($name == "kecamatan") {
      $stmt = $mysqli->prepare("SELECT id_kel, nama FROM kelurahan_daerah WHERE id_kec = ? ORDER BY nama");
    }
    $stmt->bind_param("s", $r);
    $stmt->execute();
    $stmt->bind_result($id, $nama);
    while($stmt->fetch()) {
      echo "<option value='".$id."'>$nama</option>";
    }
    $stmt->close();
  }
 ?>
