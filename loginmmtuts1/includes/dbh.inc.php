<?php


$servername = "localhost";
$dBUsername = 'id12394904_mahmudjon2127';
$dBPassword = "QC4-J/2k>F4y%{SS";
$dBName = "id12394904_loginsystemtuts";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}
