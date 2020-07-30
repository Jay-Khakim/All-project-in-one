<?php
session_start();
include_once('mysqli_connect.php');
$sessionid = $_SESSION['id'];

$filename = "uploads/profile".$sessionid."*";
$fileinfo = glob($filename);   //glob() use for searching
$fileext = explode(".", $fileinfo[0]);
$fileactualext = $fileext[1];
// print_r($fileactualext);

$file = "uploads/profile".$sessionid.".".$fileactualext;

if (!unlink($file)) {
  echo "File was not deleted";
}else {
  echo "File was Deleted!";
}
// asdasdasdasdasdasdasd
$sql = "UPDATE profile_img SET status =1 WHERE userid='$sessionid'";
mysqli_query($dbcon, $sql);
header("Location: index.php?deletesuccess");
