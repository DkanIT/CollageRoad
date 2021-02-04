<!DOCTYPE html>
<title>Users</title>
<html>
<head>
  <title>Users</title>

<?php include "DbConn.php";
session_start();?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css">
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="userform.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>

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
    color: black;
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
width: 40%;
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


  </style>

  <h1> <Strong>Şenerler Apt. Management Page </Strong></h1>
  <p >  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
  <div class="user"><?php
  echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']. "<br>")?>

  </div>


    <div class="topnav" style="border: 2px solid black;padding:10px;">

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


  <div class="row">
  <div class="columnl">
    <h1 style="color:Black;margin-top:30px;" > <center><b>User List</b> </center></h1>
    <div class="table-responsive" id="usertable">

            <button style="color:white;" class="delete" onclick="location.href='AdminDeletedUsers.php'" >Deleted Users</button>
            <?php

              echo "<table border='1' class='center' >";
              echo "<th>" .'ID' ."</th>" ;
              echo "<th>" .'Level' ."</th>" ;
              echo "<th>" .'Door Number' ."</th>" ;
              echo "<th>" .'Username' ."</th>" ;
              echo "<th>" .'First Name' ."</th>" ;
              echo "<th>" .'Last Name' ."</th>" ;
              echo "<th>".'Mail'. "</th>" ;
              echo "<th>".'Phone'. "</th>";
              echo "<th>".'Create Date'. "</th>";
              echo "<th>".'Edit'."</th>";
              echo "<th>".'Delete'."</th>"."<br>";

            $sql = "SELECT id,usertype,doornumber,username,fname,lname,mail,phone,create_date FROM userinfo WHERE status='active' ORDER BY usertype ASC,doornumber ASC";
            $result = mysqli_query($conn, $sql);
      echo "<tr>";
            while ($row = mysqli_fetch_assoc($result)) {

        foreach ($row as $field => $value) {
            echo "<td>" . $value . "</td>";

    }

?><td>
    <a href="AdminUsers.php?id=<?php echo $row['id'];?>">
    <button value="edit" class="btn btn-primary btn-xs editbtn"><i class="fa fa-pencil"></i></button></a>
  </td>
<td>

    <a href="AdminDelete.php?id=<?php echo $row['id'];?>">
    <button value="delete" class="btn btn-danger btn-xs" onClick="return confirm('Kullanıcıyı silmek istediğinizden emin misiniz?');"><i class="fa fa-trash-o "></i></button></a>

  </td>
<?php

        echo "</tr>";



    }echo "</table>";
    ?>
  <br><br>

  <?php
  $doornumber='';
  $username='';
  $password='';
  $cpassword='';
  $fname='';
  $lname='';
  $mail='';
  $phone='';
  if(isset($_GET['id'])){
  $gid=$_GET['id'];
  $query = "SELECT * from userinfo where id='".$gid."'";
  $result = mysqli_query($conn, $query) ;
  $row = mysqli_fetch_assoc($result);
  $doornumber=$row['doornumber'];
  $username=$row['username'];
  $fname=$row['fname'];
  $lname=$row['lname'];
  $mail=$row['mail'];
  $phone=$row['phone'];

  } ?>


    </div></div>
  <div class="columnr">
<div class="form-responsive">


    <div class="form">

    <form action="AdminAction.php<?php echo isset($_GET['id']) ? '?id='. $row['id'] :  ''?>" method = "post">


      <input type="radio" id="admin" name="usertype" value="admin">
      <label for="admin">Admin</label>
      <input type="radio" id="user" name="usertype" value="user" checked>
      <label for="user">User</label><br><br>


      <label for="doornumber" style="color:Black";></label>
      <input type="text"   id="doornumber" name="doornumber"  style="text-align:center;" maxlength="5" size="10" placeholder="Door Number" value="<?php echo($doornumber)?>" <br><br><br>

      <label for="username" style="color:Black";></label>
      <input type="text"  id="username" name="username" style="text-align:center;" maxlength="15" size="15"  placeholder="Enter Username" value="<?php echo($username)?>"><br><br>

      <label for="password" style="color:Black;";></label>
      <input type="password"  id="password" name="password" style="text-align:center;" maxlength="15" size="15" placeholder="Enter Password" value="<?php echo($password)?>">
      <input type="checkbox" onclick="myFunction()">
      <label for="cpassword" style="color:Black;";></label>
      <input type="password"  id="cpassword" name="cpassword" style="text-align:center;" maxlength="15" size="15" placeholder="Password Again" value="<?php echo($cpassword)?>"><br><br>


      <label for="fname" style="color:Black";></label>
      <input type="text"  id="fname"  name="fname"   style="text-align:center;" maxlength="25" size="15" placeholder="Write user's Name" value="<?php echo($fname)?>">

      <label for="lname" style="color:Black";></label>
      <input type="text"  id="lname"  name="lname"   style="text-align:center;" maxlength="25" size="15" placeholder="Write user's Surname" value="<?php echo($lname)?>"><br><br>


      <label for="mail" style="color:Black";></label>
      <input type="mail"   id="mail" name="mail"  style="text-align:center;" maxlength="30" size="25" placeholder="Enter mail address" value="<?php echo($mail)?>"><br><br>

      <label for="phone" style="color:Black";></label>
      <input type="text"   id="phone" name="phone" style="text-align:center;" maxlength="10" size="25" placeholder="Enter Phone Number without 0" value="<?php echo($phone)?>"><br><br>



          <br>
          <?php if(isset($_GET['id'])):?>
          <button type="submit" name="update" id="update" value="update" class="signupbtn"> UPDATE </button>
        <?php else: ?>
          <button type="submit" name="submit" id="submit" value="submit" class="signupbtn"> SUBMİT </button>
        <?php endif; ?>
          <input type="button" onclick="location.href='AdminUsers.php';" class="cancelbtn" value="CANCEL" />  <br>  <br>


        <br><h3 style="color:White;"><Strong> <?php if (isset($_GET['error'])) {
           echo $_GET['error'];
         } ?>  </Strong></h3>

         <script>function myFunction() {
           var x = document.getElementById("password");
           var y = document.getElementById("cpassword");
           if (x.type === "password" || y.type === "password") {
             x.type = "text";
             y.type = "text";
           } else {
             x.type = "password";
             y.type = "password";
           }
         }




         </script>

    </form>

</div>


</div>
</div>
</div>



</body>
</head>
</html>
