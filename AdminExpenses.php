<!DOCTYPE html>
<html>
<title>Expenses</title>
<head>
  <?php include "DbConn.php";ob_start();
  ?>

<body>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<link rel="stylesheet" href="background.css">

<style>
.vl {
  border-right:6px solid White;
   height:720px;

}
body{
  width: 98%;
  margin-left: auto;
  margin-right: auto;
}

textarea {
  resize: none;
  height: 150px;
  width:300px;
}
td {
background-color: white;
border: 2px solid #dddddd;
  color: black;
  padding: 6px;
text-align: center;}
  th {
  background-color: darkblue;
  border: 2px solid #dddddd;
    color: white;
    padding: 8px;
  text-align: center;}


</style>
<h1 > <Strong>Şenerler Apt. Management Page </Strong></h1>
<p >  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php session_start();
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");
?>

</div>


  <div class="topnav" style="border: 2px solid black;padding:10px;">

    <a href="AdminMain.php">Main</a>

    <a href="AdminDues.php">Dues</a>

    <a href="AdminAdministration.php">Administration</a>

    <a href="AdminRequests.php">Request</a>

    <a class="active" href="AdminExpenses.php">Expenses</a>

    <a href="AdminUsers.php">Users</a>



    <div class="topnav-right" style="right::0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>

<div class="row">
  <div class="column">

  <div class="vl">
<br><br><br><br><br><br><br>
          <h2 style="text-align:center;"> Balance Details </h2>
                <?php
                  $sql1 = "SELECT * FROM expenses WHERE expense_date='CurrentBalance'";
                  $totaldue = mysqli_query($conn, $sql1);
                  $duearray =mysqli_fetch_assoc($totaldue);
                  $sql2 = "SELECT * FROM expenses WHERE expense_date='UnpaidDepts'";
                  $result = mysqli_query($conn, $sql2);
                  $duearray2 =mysqli_fetch_assoc($result);
                  $CurrentBalance= $duearray['amount'];
                  $expectedincome =$duearray['amount']+$duearray2['amount']



        ?><center>
          <br>
          <h4>Expected Income>> <?php echo number_format($expectedincome,2)."₺";  ?></h4> <br>
          <h4>Current Balance >> <?php echo number_format($CurrentBalance,2)."₺"; ?></h4><br>
          <h4>Unpaid Depts >> <?php echo number_format($duearray2['amount'],2)."₺"; ?></h4>


   </div>
    </div>
</center>
  <div class="column">

      <div class="vl">
  <h2 style="margin-right: 10px;text-align:center;"> Expense Details </h2>


    </div>
    </div>


  <div class="column">
    <center><h3><b>Add Payment<b></h3>
   <span class="">
      <form class="p-3 mb-2 text-dark" action="addexpense.php" method="post">

        <div>
           <label  for="" class="control-label">Date</label>
             <input  style="width:30%" type="month" value="<?php echo isset($_GET['expense_date']) ? date('Y-m',strtotime($_GET['expense_date'].'-01')) :date('Y-m'); ?>" class="form-control" name="expense_date">
       </div>
        <div  >
          <label for="" class="control-label">Amount</label>
          <input type="text" style="width:30%" class="form-control" name="amount" id="exampleInputPassword1" placeholder="₺">
        </div>
        <div>
          <label for="" class="control-label">Details</label>
          <textarea type="textarea"  rows="6" cols="50" size="150" class="form-control" name="detail" id="exampleInputPassword1" placeholder="Açıklama"></textarea>

        </div>
        <br>
        <div>
          <button style="" class="btn btn-primary btn-block btn-sm col-sm-2" type="" id="new_expense" onClick="return confirm('Borç eklemek istediğinize emin misiniz?');"> <i class="fa fa-plus"> Add Bill</i></button>
        </div>

        </form>
      </center>
</span>


</div>


<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

</body>

</head>


</html>
