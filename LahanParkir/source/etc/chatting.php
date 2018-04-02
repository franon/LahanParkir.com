<?php
  include '../../db.php';
  include 'getDateTime.php';
  $waktu = getWaktuDateTime();
  if (isset($_GET['r']) && isset($_GET['u']) && isset($_GET['uos'])) {
    $u = $_GET['u'];
    $uos = $_GET['uos'];
    if($_GET['r'] !== "") {
      $r = $_GET['r'];
      $stmt = $mysqli->prepare("INSERT INTO chatting (from_id_user, to_id_user, message, waktu) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $u, $uos, $r, $waktu);
      $stmt->execute();
      $stmt->close();
    }
    $a = 0;
    $stmt = $mysqli->prepare("SELECT * FROM (SELECT from_id_user, to_id_user, message, waktu FROM chatting WHERE (from_id_user = ? && to_id_user = ?) || (from_id_user = ? && to_id_user = ?) ORDER BY id_chat DESC LIMIT 30) sub ORDER by waktu");
    $stmt->bind_param("ssss", $u, $uos, $uos, $u);
    if($stmt->execute());
    $stmt->bind_result($from_id_user, $to_id_user, $message, $waktu);
    while ($stmt->fetch()) {
      if ($from_id_user == $u) {
          echo '<p class="p-window text-right"><span><small><sub>'.$waktu.'&nbsp;&nbsp;&nbsp;</sub></small> '.$message.' <i class="fas fa-comment right"></i></span></p>';
      } else {
          echo '<p class="p-window text-left"><span><i class="fas fa-comment left"></i> '.$message.' <small><sub>&nbsp;&nbsp;&nbsp;'.$waktu.'</sub></small></span></p>';
      }
    }
    $stmt->close();
  }
 ?>
 <br>
 <br>
 <p id="end-text" class="p-window text-right"></p>
