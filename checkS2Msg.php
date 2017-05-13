<?php
  include("mysql/dbconnect.php");

  $msg=$_GET['msg'];

  $query="SELECT * FROM S2_msg WHERE no=1";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo $row[1];
    }
  }
?>
