<?php
include include "DbConn.php";

  $bid=$_GET['id'];
  $date = date('Y-m-d H:i:s');

  $update = mysqli_query($conn,"UPDATE dues SET situation='1',payment_date='$date' WHERE id =$bid");

  $select = mysqli_query($conn,"SELECT billing_date FROM dues WHERE id=$bid");

  if($update)
        header("Refresh");

 ?>
