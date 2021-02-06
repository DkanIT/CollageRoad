<!DOCTYPE html>
<title>Users</title>
<html>
<head>
  <title>Users</title>

<?php include "DbConn.php";
session_start();?>


  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="userform.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
          <link rel="stylesheet" href="background.css">
<body>
  <style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size: 15px;

  }
  body{
    width: 98%;
    margin-left: auto;
    margin-right: auto;
  }

  td {
  background-color: white;
  border: 2px solid #dddddd;
    color: black;
    padding: 6px;
  text-align: center;}
    th {
    background-color: #80bdce;
    border: 2px solid #dddddd;
      color: white;
      padding: 8px;
    text-align: center;}

      .center {
  margin-left: auto;
  margin-right: auto;
  }

    .columnl {
  float: left;
  margin-left: 50px;
  width: 60;
}
.columnr {
float: right;
width: 30%;
margin-left: 100px;
margin-top: 100px;
font-size: 1.05em;
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


img.avatar {
  width: 350px;
 height: 300px;
margin-left:140px;
}
h3{
  margin-left:100px;
  font-family: arial, sans-serif;
  font-size: 1.5em;
}
p2{
  font-size: 1.5em;
}


  </style>

  <h1> <Strong>Şenerler Apt. Management Page </Strong></h1>
  <p >  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
  <div class="user"><?php
  echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>")?>

  </div>


    <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

      <a  href="AdminMain.php">Main</a>

      <a href="AdminDues.php">Dues</a>

      <a href="AdminAdministration.php">Administration</a>

      <a href="AdminRequests.php">Request</a>

      <a href="AdminExpenses.php">Expenses</a>

      <a class="active" href="AdminUsers.php">Users</a>



      <div class="topnav-right" style="right::0;">
      <a  href="Login.php">Logout</a>

    </div>

    </div>



            <?php

            $userscounter = $conn->query("SELECT * from userinfo where status='inactive' and usertype='user' ");
            $user = mysqli_num_rows($userscounter);?>

          <div class="row">
          <div class="columnl">
    <h1 style="color:Black;margin-top:30px;" > <center><b>Deleted User List</b> </center></h1>
            <div class="table-responsive" id="usertable">
              <div class="card-group" >
              <div class="card text-white bg-primary mb-2" style="max-width:13rem;">
            <div class="card-body">
            <h5 class="card-title">Number of Inactive Users : <?php echo $user; ?></h5>
            <button style="color:white;" class="delete" onclick="location.href='AdminUsers.php'" >Current Users</button>
            </div>
            </div>
            </div>
            <?php

              echo "<table border='1' class='center' >";
              echo "<th>" .'ID' ."</th>" ;
              echo "<th>" .'Level' ."</th>" ;
              echo "<th>" .'DoorNumber' ."</th>" ;
              echo "<th>" .'Username' ."</th>" ;
              echo "<th>" .'First Name' ."</th>" ;
              echo "<th>" .'Last Name' ."</th>" ;
              echo "<th>".'Mail'. "</th>" ;
              echo "<th>".'Phone'. "</th>";
              echo "<th>".'Create Date'. "</th>";
              echo "<th>".'Delete Date'. "</th>";

              $sql = "SELECT id,usertype,doornumber,username,fname,lname,mail,phone,create_date,delete_date FROM userinfo WHERE status='inactive' ORDER BY usertype ASC,doornumber ASC";
            $result = mysqli_query($conn, $sql);
      echo "<tr>";
            while ($row = mysqli_fetch_assoc($result)) {

        foreach ($row as $field => $value) {
            echo "<td>" . $value . "</td>";

    }


        echo "</tr>";



    }echo "</table>";
    ?>
  <br><br>


</div>


</div>
<div class="columnr" style="margin-left:10%;">

  <img src="manage.png" alt="Avatar" class="avatar">


  <div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Information About Deleted Users!</h4>
    <p>-These users are deleted from your website and also your current active database. </p>
    <hr>
    <p class="mb-0">-So, you can create on them new residents using by their doornumber.</p>
  </div>

</div>
</div>



</body>
</head>
</html>
