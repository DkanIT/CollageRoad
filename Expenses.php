<!DOCTYPE html>
<html>
<head>
  <title>Expenses</title>
  <?php include "DbConn.php";
  session_start();?>
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

  <style >
  body{
    width: 98%;
    margin-left: auto;
    margin-right: auto;
  }
  .logout {
    position: absolute;
      border: 1px solid aqua;
      top: 70px;
      right: 15px;
  }
.vl {
  border-right:6px solid White;
 height:720px;

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
  text-align: center;
  }
</style>


<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>
<p style="color:White;">  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");?>

</div>


  <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

    <a href="Main.php">Main</a>

    <a href="Dues.php?id=<?php echo $_SESSION['id'];?>">Dues</a>

    <a href="Administration.php">Administration</a>

    <a  href="Requests.php">Request</a>

    <a class="active" href="Expenses.php">Expenses</a>


    <div class="topnav-right" style="right::0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>


<div class="row">
  <div class="columnl">
    <h2 style="color:Aqua; text-align:center;"> Archive </h2>
  <div class="vl">

    <div style="margin-left:300px" ><br><br>
    <?php
    $sql = "SELECT * FROM expenses ORDER BY expenseid ASC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
    $date=$row['date'];

    ?>

      <a href="Expenses.php?expenseid=<?php echo $row['expenseid'];?>">
      <button value="edit" class="btn btn-primary btn-xs editbtn"><?php echo($date) ?></button></a>

    <br><br> <?php }
    $sql1 = "SELECT * FROM expenses WHERE date='CurrentBalance'";
    $totaldue = mysqli_query($conn, $sql1);
    $duearray =mysqli_fetch_assoc($totaldue);
    $sql2 = "SELECT * FROM expenses WHERE date='UnpaidDepts'";
    $result = mysqli_query($conn, $sql2);
    $duearray2 =mysqli_fetch_assoc($result);
    $CurrentBalance= $duearray['price'];
    $expectedincome =$duearray['price']+$duearray2['price']

    ?> <br>
    </div>
   </div>
    </div>

  <div class="columnr">
    <h2 style="color:DarkBlue; text-align:center;">  Balance Details </h2>
  <center>
    <br>
    <h4>Expected Income>> <?php echo number_format($expectedincome,2)."₺";  ?></h4> <br>
    <h4>Current Balance >> <?php echo number_format($CurrentBalance,2)."₺"; ?></h4><br>
    <h4>Unpaid Depts >> <?php echo number_format($duearray2['price'],2)."₺"; ?></h4>
    <!--Expense details-->
    <h2 style="color:DarkBlue;margin-top: 100px;text-align:center;"> Expense Details </h2>
    <?php if(isset($_GET['expenseid'])){
    $detailsid=$_GET['expenseid'];
    echo "<table border='1' class='center' >";
    echo "<th>".'Date'. "</th>";
    echo "<th>".'Details'."</th>";
    echo "<th>".'Price'."</th>"."<br>";
    $sql = "SELECT date,details,price FROM expenses WHERE expenseid='$detailsid'";
    $result = mysqli_query($conn, $sql);
    echo "<tr>";
    while ($row = mysqli_fetch_assoc($result)) {

    foreach ($row as $field => $value) {
    echo "<td>" . $value . "</td>";

    }

    echo "<tr>";
    }
    echo "</table>";}

    ?>


    </div>

</div>


<meta name="viewport" content="width=device-width, initial-scale=1">



<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.columnl {
  float: left;
  width: 40%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.columnr {
  float: left;
  width: 60%;
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
