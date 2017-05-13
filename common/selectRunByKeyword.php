<?php
  include("db_conn.php");

  $keyword=$_GET['keyword'];

  $query="SELECT * FROM S2_run WHERE keyword='$keyword'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      if($row[3]=="1"){
        echo "pass";
        return;
      }else{
        echo $row[2];
      }
    }
  }
  $query="UPDATE S2_run SET status=1 WHERE keyword='$keyword'";
  $result=mysqli_query($con,$query);
?>
