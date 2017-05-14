<?php
  $host="localhost";
  $username="root";
  $password="apmsetup";
  $dbname="s2";

  $con=mysqli_connect($host,$username,$password,$dbname);
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
