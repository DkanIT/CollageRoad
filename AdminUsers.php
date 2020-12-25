<!DOCTYPE html>
<title>Users</title>
<html>
<head>
  <title>Users</title>

<?php include "DbConn.php"; ?>
  <link rel="stylesheet" href="background.css">
<body>
  <style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 40%;
    font-size: 16px;

  }
  td {
  background-color: white;
  border: 2px solid #dddddd;
    color: black;
    padding: 6px;
  text-align: center;}
    th {
    background-color: Black;
    border: 2px solid #dddddd;
      color: white;
      padding: 6px;
    text-align: center;}

      .center {
  margin-left: auto;
  margin-right: auto;
  }
  .btn-class{
         background-image: url('delete.png');

    }



  </style>

<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>



</div>


<p style="color:White";> <Strong>Welcome our webpage which you can follow our announcements and changes.</Strong></p>

<div style="border: 2px solid black;color:white;padding:10px;">



  <a><?php echo( "<button onclick= \"location.href='AdminMain.php'\">Main</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminDues.php'\">Dues</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminAdministration.php'\">Administration</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminRequests.php'\">Requests</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminExpenses.php'\">Expenses</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminUsers.php'\">Users</button>");?></a>





  </div>

  <div tyle="position: absolute">
          <h1 style="color:Black" ; > <center><strong><b>MEMBERS</b> </strong></center></h1>

          <?php
          $imagehtml = '<img  src="delete.png" />';
            echo "<table border='1' class='center' >";
            echo "<th>" .'Level' ."</th>" ;
            echo "<th>" .'DoorNum' ."</th>" ;
            echo "<th>" .'Username' ."</th>" ;
            echo "<th>" .'First Name' ."</th>" ;
            echo "<th>" .'Last Name' ."</th>" ;
              echo "<th>".'Mail'. "</th>" ;
            echo "<th>".'Phone'. "</th>"."<br>";

          $sql = "SELECT usertype,doornumber,username,fname,lname,mail,phone FROM userinfo ORDER BY usertype ASC,doornumber ASC";
          $result = mysqli_query($conn, $sql);
    echo "<tr>";
          while ($row = mysqli_fetch_assoc($result)) {

      foreach ($row as $field => $value) {
          echo "<td>" . $value . "</td>";


      }//echo "<td>"."<a href='AdminDeleteUser.php'>". $imagehtml ."</a>" ."</td>";
      echo "</tr>";



  }
  ?>




  </div>
  <div >
      <?php  echo( "<center><button onclick= \"location.href='AdminCreateUser.php'\">Create New User</button></center>");  ?><br><br>
  </div>




</body>
<head>
</html>
