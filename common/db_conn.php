<?php
  $host="localhost";
  $username="nar001";
  $password="l323585@";
  $dbname="nar001";

  $con=mysqli_connect($host,$username,$password,$dbname);
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
