<?php
include "DbConn.php";


  if(isset($_POST['expense_date']) && isset($_POST['amount'])) {
if (is_numeric($_POST['amount']) && !empty($_POST['detail'])) {

  $month = date('Y-m-d',strtotime($_POST['expense_date']));
  $amount = $_POST['amount'];
  $detail = $_POST['detail'];

$newexpense = $conn->query("INSERT INTO expenses (expense_date,details,amount) VALUES ('$month','$detail','$amount')");



header("Location:AdminExpenses.php");

}
else {
    header("Location:AdminExpenses.php?error=Geçerli miktar ve açıklama giriniz.");
}

}
 ?>
