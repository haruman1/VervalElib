<?php
require 'env.php';
// if (!isset($_ENV['DB_HOST']) || $_ENV['DB_USERNAME'] || $_ENV['DB_PASSWORD'] || $_ENV['DB_DATABASE']) {
// //   // die("anda belum install file configurasi,dimohon install dengan benar <a href='#goBack' onClick='history.go(-1); return false;' class='button'>Go back</a>");
// //   var_dump($_ENV);
// } else {
$cuaca = date_default_timezone_set($_ENV['TIMEZONE']);
$jaringan = $_ENV['DB_HOST'];
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$db = $_ENV['DB_DATABASE'];
$con = mysqli_connect($jaringan, $user, $pass, $db);
mysqli_select_db($con, $db);

if (!$con) {
  die('Connection failed: ' . mysqli_connect_error());
}
// }
