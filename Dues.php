<!DOCTYPE html>
<html>
<head>
<title>Dues</title>
<?php include "DbConn.php"; ?>
<link rel="stylesheet" href="background.css">
<body>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
th {
background-color: black;
  color: white;
  padding: 10px;}

td {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


</style>
<h1 style="color:White;"> <Strong> Şenerler Apt. Management Page</h1>

<p style="color:White";>Welcome our webpage which you can follow our announcements and changes.</p>


<div style="border: 2px solid black;color:white;padding:10px;">

  <a><?php echo( "<button onclick= \"location.href='Main.php'\">Main</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='Dues.php'\">Dues</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='Administration.php'\">Administration</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='Requests.php'\">Requests</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='Expenses.php'\">Expenses</button>");?></a>



</div>


<h2 style="color:red;"> Dues in 2020 </h2>







<div tyle="position: absolute">
        <h1 style="color:Black" ; > <center><strong><b>Payment Board</b> </strong></center></h1>

        <?php


          echo "<table border='1' class='center' >";
            echo "<th>" ."</th>" ;
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
