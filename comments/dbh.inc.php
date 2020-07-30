<?php
$conn = mysqli_connect('localhost', 'root', 'ab2414950', 'commentsection');

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}
