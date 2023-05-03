<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'empresa'
) or die(mysqli_error($mysqli));
?>