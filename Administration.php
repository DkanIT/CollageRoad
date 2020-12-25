<!DOCTYPE html>
<html>
<?php include "DbConn.php"; ?>

  <link rel="stylesheet" href="background.css">
  <head>
    <title>Administration</title>

<body>
<style>

h13{
color:White;
margin-left: 10px;

}
.adddiv{
  margin-top: 20px;
  border-color: White;

}
p2{
  font-family:fantasy;
  color:Black;
  margin-left: 30px;
}
hr{

  margin-left: 0px;
}
h2 {
  text-align: center;

}
</style>

<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page</h1>
<p style="color:White;"> Welcome our webpage which you can follow our announcements and changes.</p>

<div style="border: 2px solid black;color:white;padding:10px;">




<a><?php echo( "<button onclick= \"location.href='Main.php'\">Main</button>");?></a>

<a><?php echo( "<button onclick= \"location.href='Dues.php'\">Dues</button>");?></a>

<a><?php echo( "<button onclick= \"location.href='Administration.php'\">Administration</button>");?></a>

<a><?php echo( "<button onclick= \"location.href='Requests.php'\">Requests</button>");?></a>

<a><?php echo( "<button onclick= \"location.href='Expenses.php'\">Expenses</button>");?></a>


</div>

<div class="adddiv">
  <h2 style="color:White:"> <Strong>Announcements</h2> <hr>

  <?php

  $sql = "SELECT date,adminnick,announcement FROM announcement ORDER BY que DESC";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     echo "<h13>".  "Admin: ".$row["adminnick"] ."</h13>". "<br>"."<br>" ;
      echo "<h13>"." Date: " . $row["date"]."</h13>". "<br>" ;
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
