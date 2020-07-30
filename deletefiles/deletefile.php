<?php
$fileNames = $_POST['filename'];
$removeSpaces = str_replace(" ", "", $fileNames);
$allFileNames = explode(",", $removeSpaces);
// Using code below  you can find search the path and full name of files if you dont know
// $path = "uploads/*";
//
// $fileinfo = glob($path);
// print_r($fileinfo);

$countAllNames = count($allFileNames);
for ($i=0; $i < $countAllNames; $i++) {
  if (file_exists("uploads/".$allFileNames[$i]) == false) {
    header("Location: index.php?deleteerror");
    exit();
  }
}

for ($i=0; $i < $countAllNames; $i++) {
  $path = "uploads/".$allFileNames[$i];
  if (!unlink($path)) {
    echo "You have an error!";
    exit();
  }
}
header("Location: index.php?deletesuccess");
?>
