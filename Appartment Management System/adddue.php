<?php
include "DbConn.php";


  if(isset($_POST['billing_date']) && isset($_POST['amount'])) {
if (is_numeric($_POST['amount']) && !empty($_POST['detail'])) {

  $month = date('Y-m-d',strtotime($_POST['billing_date']));
  $amount = $_POST['amount'];
  $detail = $_POST['detail'];
  $ret=mysqli_query($conn,"select * from userinfo where delete_date  IS NULL AND usertype='user'");
$cnt=1;
while($row=mysqli_fetch_array($ret))
{
$uid = $row['id'];
$newbilling = $conn->query("INSERT INTO dues (billing_date,user_id,amount,detail) VALUES ('$month','$uid','$amount','$detail')");


}
header("Location:AdminDues.php?month=$month");
}
else {
  // code...
  header("Location:AdminDues.php?error=Geçerli miktar ve açıklama giriniz.");
}

}
 ?>
