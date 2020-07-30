<?php
$path = "uploads/*";

$fileinfo = glob($path);

$fileactualname = $fileinfo[0];

if (!unlink($fileactualname)) {
  echo "You have an error";
}else {
  header("Location: index.php?deletesuccess");
}
print_r($fileinfo);
