<!DOCTYPE html>
<html>
<head>
<title>Dues</title>
<?php include "DbConn.php";
session_start();?>
<link rel="stylesheet" href="background.css">
<link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<body>

<style>
body{
  width: 98%;
  margin-left: auto;
  margin-right: auto;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin-left: 10%;
}
th {
background-color: darkblue;
  color: white;
  padding: 10px;}

td {
  border: 1px color:Black ;
  text-align: center;
  padding: 8px;
  background-color: #dddddd;
}
.logout {
  position: absolute;
    border: 1px solid aqua;
    top: 70px;
    right: 15px;
}


</style>
<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>
<p style="color:White;">  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");?>

</div>


  <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

    <a href="Main.php">Main</a>

    <a class="active" href="Dues.php">Dues</a>

    <a href="Administration.php">Administration</a>

    <a href="Requests.php">Request</a>

    <a href="Expenses.php">Expenses</a>


    <div class="topnav-right" style="right::0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>

<h2 style="color:red;margin-top:20px;"> Dues in 2021 </h2>







<div tyle="position: absolute">
        <h1 style="color:Black" ; > <center><strong><b>Payment Board</b> </strong></center></h1>

        <?php


          echo "<table border='1' class='center' >";
          echo "<th>" .'RoomNumber' ."</th>" ;
          echo "<th>" .'FirstName' ."</th>" ;
          echo "<th>" .'LastName' ."</th>" ;
          echo "<th>" .'January' ."</th>" ;
          echo "<th>" .'February' ."</th>" ;
          echo "<th>" .'March' ."</th>" ;
          echo "<th>" .'April' ."</th>" ;
          echo "<th>" .'May' ."</th>" ;
          echo "<th>" .'June' ."</th>" ;
          echo "<th>" .'July' ."</th>" ;
          echo "<th>" .'August' ."</th>" ;
          echo "<th>" .'September' ."</th>" ;
          echo "<th>" .'October' ."</th>" ;
          echo "<th>" .'November' ."</th>" ;
          echo "<th>" .'December' ."</th>" ;


          $sql = "SELECT * FROM dues  ";
  $result = mysqli_query($conn, $sql);
  echo "<tr>";
while ($row = mysqli_fetch_assoc($result)) {
  foreach ($row as $field => $value) {
      echo "<td>" . $value . "</td>";
  }
  /*  echo "<th>" .  $row['month'] . "</th>";

    echo "<tr>";
        echo "<td>" .$row['fname']. $row['lname'] . "</td>";
        echo "<td>" . $row['payment'] ."</td>";

    echo "<tr>";*/
  echo "</tr>";
}
echo "</table>";


?>




</div>


</body>
</head>
</html>
