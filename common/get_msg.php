<?php
  include("db_conn.php");

  $query="SELECT * FROM S2_msg WHERE no=1";
  $result=mysqli_query($con,$query);
  if($result){
    while($row=mysqli_fetch_row($result)){
      if($row[1])
        echo $row[1];
      else
        echo "success";
    }
  }else{
  	echo "fail.";
  }
?>
