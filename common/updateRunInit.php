<?php
  include("db_conn.php");

  $query="UPDATE S2_run SET status=-1";
  $result=mysqli_query($con,$query);
?>
