<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <?php include "DbConn.php";
  session_start();?>
<title>Request</title>
<style>
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
h13{
color:White;
margin-left: 10px;
text-transform: capitalize;
font-weight: bold;

}



table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 40%;
  font-size: 14px;
   text-align: center;

}
td {
background-color: white;
border: 2px solid #dddddd;
  color: black;
  padding: 5px;}
  th {
  background-color: Black;
  border: 2px solid #dddddd;
    color: white;
    padding: 5px;}
    .center {
margin-left: auto;
margin-right: auto;
}

textarea {
  resize: none;
  height: 80px;
  width: 320px;
}
.adddiv{
  margin-top: 20px;
  border-color: White;

}

</style>

<body>

    <h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>
    <p style="color:White;">  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
    <div class="user"><?php
    echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");?>

    </div>


      <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

        <a href="Main.php">Main</a>

        <a href="Dues.php">Dues</a>

        <a href="Administration.php">Administration</a>

        <a class="active" href="Requests.php">Request</a>

        <a href="Expenses.php">Expenses</a>




        <div class="topnav-right" style="right::0;">
        <a  href="Login.php">Logout</a>

      </div>

      </div>

<div>
<div class="adddiv">
  <h2 style="color:Black;"> <Strong>Request</Strong></h2>

        <?php




        $sql = "SELECT * FROM request ORDER BY reqid DESC";
        $result = mysqli_query($conn, $sql);
  echo "<tr>";
  if ($result->num_rows > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<h13>".  "Send By: ".$row["fname"] ." ".$row["lname"] ." >> Date: " . $row["date"]."</h13>". "<br>"."<br>" ;
             echo "<p2>" . $row["req"]. "</p2>"."<hr>" ;
            }}
            else {
            echo "0 results";
            }

?>
</div>






<div style="position: absolute; right: 10px;bottom: 10px">

<form action="Requests.php" method = "post">

  <label for="req" style="color:White";><center>Request Text Area</center></label><br>
  <textarea type="text" id="req" name="req"   maxlength="120" size="150" value=" "></textarea><br><br>
  <button type="submit" name="submit"> SUBMİT </button>

</form>

<?php

  if (isset($_POST['submit']) && !empty($_POST['req'])) {
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $req = $_POST['req'];


    $sql = "INSERT INTO request(fname, lname, req) VALUES ('$fname','$lname','$req')";


    //isset denen şey yukardaki o bu submit yaptıgın buttondaki name attribute sine eşit olucak.
    // ve form un içine alman lazım bu ekleyeceğin valueları. method unu da belirlemen lazım post diye çünkü isteğin post ve genelde post kullanılıyor.


    //mysqli_query($conn,$sql);
    if ($conn->query($sql) === TRUE) {
      echo "New Request Sent!<br />";
    } else {
      echo "Request can not send!<br />";
    }
    header('location:Requests.php');


  }
  ?>





</div>

</body>
</head>
</html>
