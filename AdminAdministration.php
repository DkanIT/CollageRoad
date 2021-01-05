<!DOCTYPE html>
<html>
<?php include "DbConn.php";
session_start();

?>
<head>
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Administration</title>
<style>
body{
  width: 98%;
  margin-left: auto;
  margin-right: auto;
}
textarea {
  resize: none;
  height: 80px;
  width: 320px;
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
<body>

<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>
<p style="color:White;">  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");?>

</div>


  <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

    <a href="AdminMain.php">Main</a>

    <a href="AdminDues.php">Dues</a>

    <a class="active" href="AdminAdministration.php">Administration</a>

    <a href="AdminRequests.php">Request</a>

    <a href="AdminExpenses.php">Expenses</a>

    <a href="AdminUsers.php">Users</a>



    <div class="topnav-right" style="right::0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>




<div class="adddiv">
  <h2 style="color:Black;"> <Strong>Announcements</Strong></h2>

  <?php

  $sql = "SELECT * FROM announcement ORDER BY annid DESC";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     echo "<h13>".  "Send By: ".$row["adminnick"] ." >> Date: " . $row["date"]."</h13>". "<br>"."<br>" ;?>
     <a href="AdminAdministration.php?id=<?php echo $row['annid'];?>">
     <button value="delete" class="btn btn-danger btn-xs" onClick="return confirm('Do you want to delete this post?');"><i class="fa fa-trash-o "></i></button></a>
    <?php  echo "<p2>" . $row["announcement"]. "</p2>"."<hr>" ;
    }
  } else {
    echo "0 results";
  }
?>

</div>

<div style="position: absolute;right:10px; bottom:10px">

<form action="AdminAdministration.php" method = "post">

    <label for="announcement" style="color:White;"><center>Announcement Text Area</center></label><br>
  <textarea  type="text" id="announcement" name="announcement"  maxlength="180">  </textarea><br><br>
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
    if(isset($_GET['id'])) {
    $adminid=$_GET['id'];
    $msg=mysqli_query($conn,"delete from announcement where annid='$adminid'");

      header("Location:AdminAdministration.php"); }

  ?>


</body>
</head>
</html>
