<?
  include("db_conn.php");

  $msg=$_GET['msg'];

  $query="update S2_msg set msg='$msg' where no=1";
  if($result=mysqli_query($con,$query)){
    echo "success";
  }
?>
