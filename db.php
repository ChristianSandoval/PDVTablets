<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'programa_lenceria',
  'r!7A.d01',
  'programa_pp'
) or die(mysqli_erro($mysqli));
?>