<!DOCTYPE html>


<?php include "DbConn.php";
session_start();?>
<html>
<head>
  <link rel="stylesheet" href="background.css">
<title>Request</title>
<style>
label { display: block; width: 100px; }

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

</style>

<body>

<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page</Strong></h1>

<p style="color:White;"> <Strong> Welcome our webpage which you can follow our announcements and changes.</p>

<div>




  <div style="border: 2px solid black;color:white;padding:10px;">


  <a><?php echo( "<button onclick= \"location.href='Main.php'\">Main</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='Dues.php'\">Dues</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='Administration.php'\">Administration</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='Requests.php'\">Requests</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='Expenses.php'\">Expenses</button>");?></a>


</div>

<div>

        <?php
          echo "<table border='1' class='center'>";
            echo "<th>" .'Date' ."</th>" ;
          echo "<th>" .'Name' ."</th>" ;
            echo "<th>".'Last Name'. "</th>";
            echo "<th>".'Request'. "</th>"."<br>";



        $sql = "SELECT date,fname,lname,req FROM request ORDER BY reqid DESC";
        $result = mysqli_query($conn, $sql);
  echo "<tr>";
        while ($row = mysqli_fetch_assoc($result)) {

    foreach ($row as $field => $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
</div>






<div style="position: absolute; bottom: 5px">

<form action="Requests.php" method = "post">

  <label for="req" style="color:White";>Request:</label><br>
  <input type="text" id="req" name="req"   maxlength="120" size="150" value=" "><br><br>
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
