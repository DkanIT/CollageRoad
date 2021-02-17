<?php
include "DbConn.php";

  $bid=$_GET['id'];
  $date = date('Y-m-d H:i:s');

  $update = mysqli_query($conn,"UPDATE dues SET situation='1',payment_date='$date' WHERE id =$bid");


  if($update)
        header("Location:AdminUsers.php");

 ?>
