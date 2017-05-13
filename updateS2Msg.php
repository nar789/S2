
<?php
  include("mysql/dbconnect.php");

  $msg=$_GET['msg'];

  echo $query="UPDATE S2_msg SET msg='$msg' WHERE no=1";
  mysqli_query($con,$query);
  echo "Suc";

?>
