<!DOCTYPE html>
<html>
<?php include "DbConn.php";
session_start();
?>
<head>
  <link rel="stylesheet" href="background.css">
<title>Administration</title>
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
<body>



<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>
<p style="color:White;">  <Strong>Welcome our webpage which you can follow our announcements and changes. </Strong></p>


<div style="border: 2px solid black;color:white;padding:10px;">

  <a><?php echo( "<button onclick= \"location.href='AdminMain.php'\">Main</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminDues.php'\">Dues</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminAdministration.php'\">Administration</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminRequests.php'\">Requests</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminExpenses.php'\">Expenses</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminUsers.php'\">Users</button>");?></a>


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

<div style="position: absolute; bottom: 5px">

<form action="AdminAdministration.php" method = "post">

    <label for="announcement" style="color:White ;";>Request:</label><br>
  <input style="height:50px; width:450px;"  type="text" id="announcement" name="announcement"   maxlength="120" value=" "><br><br>
  <button type="submit" name="submit"> SUBMİT </button>

</form>

<?php

  if (isset($_POST['submit']) && !empty($_POST['announcement'])) {
      $ann = $_POST['announcement'];
      $admin= $_SESSION['username'];

    $sql = "INSERT INTO announcement(announcement,adminnick) VALUES ('$ann','$admin')";


    if ($conn->query($sql) === TRUE) {
      echo "New Announcement Sent!<br />";
    } else {
      echo "Announcement can not send!<br />";
    }
    header('location:AdminAdministration.php');


  }
  ?>


</body>
</head>
</html>
