<?php
function getWaktuDateTime() {
  date_default_timezone_set('Asia/Jakarta');
  $timestamp = time();
  $date_time = date("Y-m-d H:i:s", $timestamp);
  // echo "Current date and local time on this server is $date_time";
  return $date_time;
}
 ?>
