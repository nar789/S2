<?php
  include("mysql/dbconnect.php");

  $query="UPDATE S2_run SET status=-1";
  $result=mysqli_query($con,$query);
?>
