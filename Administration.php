<!DOCTYPE html>
<html>
<?php include "DbConn.php";
session_start();?>

  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <head>
    <title>Administration</title>

<body>
<style>
body{
  width: 98%;
  margin-left: auto;
  margin-right: auto;
}

h13{
color:White;
margin-left: 10px;
text-transform: capitalize;
font-weight: bold;

}
.adddiv{
  margin-top: 20px;
  border-color: White;

}
p2{
  font-family:cursive;
  color:black;
  margin-left: 30px;
  font-size: 1.15em;
  font-weight: bold;
}
h2 {
  text-align: center;
  font-size: 1.7em;
  text-decoration: underline;
  font-family: sans-serif;
 font-weight: bold;
}

</style>

<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>
<p style="color:White;">  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");?>

</div>


  <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

    <a href="Main.php">Main</a>

    <a href="Dues.php">Dues</a>

    <a class="active" href="Administration.php">Administration</a>

    <a href="Requests.php">Request</a>

    <a href="Expenses.php">Expenses</a>


    <div class="topnav-right" style="right::0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>


<div class="adddiv">
  <h2 style="color:White:"> <Strong>Announcements</strong></h2>

  <?php

  $sql = "SELECT * FROM announcement ORDER BY annid DESC";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     echo "<h13>".  "Send By: ".$row["adminnick"] ." >> Date: " . $row["date"]."</h13>". "<br>"."<br>" ;
      echo "<p2>" . $row["announcement"]. "</p2>"."<hr>" ;
    }
  } else {
    echo "0 results";
  }
?>

</div>



</body>
  </head>
</html>
