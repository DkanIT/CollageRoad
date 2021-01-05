<!DOCTYPE html>
<html>
<head>
  <title>Dues</title>
  <?php include "DbConn.php";
  session_start();
  ob_start();?>
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <style>
  table {
    font-family: arial, sans-serif;
    text-align: center;
    border-collapse: collapse;
    width:70%;
    margin-left: 60px;
  }
  body{
    width: 98%;
    margin-left: auto;
    margin-right: auto;
  }
  th {
    text-align: center;
  background-color: darkblue;
    color: white;
    padding: 10px;}


    td {
      border: 1px color:Black ;
      text-align: center;
      padding: 8px;
      background-color: #dddddd;
    }
    .logout {
      position: absolute;
        border: 1px solid aqua;
        top: 70px;
        right: 15px;
    }
    .column {
  float: left;

}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: flex;
  clear: both;
}
.left {
  width: 75%;
}

.right {
  height: 75%;
  width: 25%;

}
input {
    text-align: center;
}

form {


      border: 5px solid;
      border-image-slice: 1;
      border-image-source: linear-gradient(to right, darkblue, aqua);
      margin-top: 120px;
      margin-right: 90px;
      margin-left: 90px;
      border-image-outset: 5px;
      }

      input, textarea, select, button {
        width : 120px;
        padding: 0;
        margin: 20;
        box-sizing: border-box;
      }
      .signupbtn {


        height: 50px;
        background-color: darkblue;
        border-image-slice: 1;
        width: 100%;
        background-image:linear-gradient(to left ,aqua, darkblue);
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

      <a class="active" href="AdminDues.php">Dues</a>

      <a href="AdminAdministration.php">Administration</a>

      <a href="AdminRequests.php">Request</a>

      <a href="AdminExpenses.php">Expenses</a>

      <a href="AdminUsers.php">Users</a>



      <div class="topnav-right" style="right::0;">
      <a  href="Login.php">Logout</a>

    </div>

    </div>



<h2 style="color:red;margin-top:20px;"> Dues in 2021 </h2>


<div class="row">
<div class="column left">
        <h1 style="color:Black" ; > <center><strong><b>Payment Board</b> </strong></center></h1>

        <?php


          echo "<table border='1' class='center' >";
          echo "<th>" .'DoorNumber' ."</th>" ;
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
  echo "</tr>";
}
echo "</table>";

?>
</div>

<div class="column right">
  <?php  $sql = "SELECT doornumber FROM dues ORDER BY doornumber ASC";
  $result = mysqli_query($conn, $sql);
?>

<form action="AdminDues.php" method ="post">
<Strong>
  <br>
  <label for="doornumber">Door Number : </label>
  <Select  id="doornumber" name="doornumber" ><br><br>
  <?php
  while ($row = mysqli_fetch_array($result)) {

    ?>
    <option> <?php echo $row['doornumber']; ?></option>
    <?php


}

?>
</select><br><br>
  <label for="month">Select month : </label>
  <select tpye="text"; id="month" name="month" value="Month">
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>

  </select>

<br><br>
  <label for="payment">Payment : </label>
  <select id="payment" name="payment">
    <option value="Unpaid">Unpaid</option>
     <option value="Paid">Paid</option>
       </select>

      <br><br> <button type="submit" name="submit" class="signupbtn"><Strong>Update Payment Status</Strong> </button>
      <br><h5 style="color:White;margin-left:45px;"><Strong> <?php if (isset($_GET['error'])) {
         echo $_GET['error'];
       } ?>  </Strong></h5>
</Strong>
</form>

<?php


if(isset($_POST['submit'])){
      $ay=$_POST['month'];
      $doornumber=$_POST['doornumber'];
      $payment=$_POST['payment'];


        $aidat=50;
              $sql = mysqli_query($conn,"UPDATE dues SET $ay='$payment' WHERE doornumber='$doornumber'");

              $sql = mysqli_query($conn,"SELECT * FROM dues");
              $row = mysqli_fetch_array($result);
                echo $row[$ay];


              if($_POST['payment']=='Paid' && $row[$ay]!="Paid"){
                $date="CurrentBalance";
                $sql1 = mysqli_query($conn,"UPDATE Expenses SET price=price+'$aidat' WHERE date='$date'");

            header("Location:AdminDues.php?error=Ödeme Güncellendi");}
              elseif($_POST['payment']=='Unpaid' && $row[$ay]!="Unpaid"){
                  $date="CurrentBalance";
                  $sql2 = mysqli_query($conn,"UPDATE Expenses SET price=price-'$aidat' WHERE date='$date'");
header("Location:AdminDues.php?error=Ödeme Güncellendi");}

}

//balance UPDATE


ob_flush();?>


</div>
</div>
</body>
</head>
</html>
