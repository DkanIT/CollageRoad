<!DOCTYPE html>
<html>
<title>Expenses</title>
<head>
  <?php include "DbConn.php";ob_start();
  ?>

<body>
    <link rel="stylesheet" href="background.css">
    <link rel="stylesheet" href="UploadImage.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.vl {
  border-right:6px solid White;
   height:720px;

}
body{
  width: 98%;
  margin-left: auto;
  margin-right: auto;
}

textarea {
  resize: none;
  height: 150px;
  width:300px;
}
td {
background-color: white;
border: 2px solid #dddddd;
  color: black;
  padding: 6px;
text-align: center;}
  th {
  background-color: darkblue;
  border: 2px solid #dddddd;
    color: white;
    padding: 8px;
  text-align: center;}


</style>
<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>
<p style="color:White;">  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php session_start();
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");
?>

</div>


  <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

    <a href="AdminMain.php">Main</a>

    <a href="AdminDues.php">Dues</a>

    <a href="AdminAdministration.php">Administration</a>

    <a href="AdminRequests.php">Request</a>

    <a class="active" href="AdminExpenses.php">Expenses</a>

    <a href="AdminUsers.php">Users</a>



    <div class="topnav-right" style="right::0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>

<div class="row">
  <div class="column">
    <h2 style="color:Aqua; text-align:center;"> Archive </h2>
  <div class="vl">
    <div style="margin-left:70px" ><br><br>
<?php
$sql = "SELECT * FROM expenses ORDER BY expenseid ASC";
$result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
  $date=$row['date'];

    ?>

      <a href="AdminExpenses.php?expenseid=<?php echo $row['expenseid'];?>">
      <button value="edit" class="btn btn-primary btn-xs editbtn"><?php echo($date) ?></button></a>

<br><br> <?php }


?> <br>
</div>
   </div>
    </div>

  <div class="column">
    <h2 style="color:DarkBlue; text-align:center;"> Balance Details </h2>
      <div class="vl">

        <?php
          $sql1 = "SELECT * FROM expenses WHERE date='CurrentBalance'";
          $totaldue = mysqli_query($conn, $sql1);
          $duearray =mysqli_fetch_assoc($totaldue);
          $sql2 = "SELECT * FROM expenses WHERE date='UnpaidDepts'";
          $result = mysqli_query($conn, $sql2);
          $duearray2 =mysqli_fetch_assoc($result);
          $CurrentBalance= ($duearray['price']-$duearray2['price']);



?><center>
  <br>
  <h4>Expected Income>> <?php echo number_format($duearray['price'],2)."₺";  ?></h4> <br>
  <h4>Current Balance >> <?php echo number_format($CurrentBalance,2)."₺"; ?></h4><br>
  <h4>Unpaid Depts >> <?php echo number_format($duearray2['price'],2)."₺"; ?></h4>
  <!--Expense details-->
  <h2 style="color:DarkBlue;margin-top:100px;margin-right: 10px;text-align:center;"> Expense Details </h2>
  <?php if(isset($_GET['expenseid'])){
    $detailsid=$_GET['expenseid'];
      echo "<table border='1' class='center' >";
      echo "<th>".'Date'. "</th>";
    echo "<th>".'Details'."</th>";
    echo "<th>".'Price'."</th>"."<br>";
    $sql = "SELECT date,details,price FROM expenses WHERE expenseid='$detailsid'";
    $result = mysqli_query($conn, $sql);
  echo "<tr>";
    while ($row = mysqli_fetch_assoc($result)) {

  foreach ($row as $field => $value) {
    echo "<td>" . $value . "</td>";

  }

  echo "<tr>";
  }
echo "</table>";}

  ?>
</div>

    </div>
</center>

  <div class="column">
    <h2 style="color:DarkBlue; text-align:center;"> Add Expenses </h2>
    <form style="margin-left:150px;margin-top:90px" action="AdminExpenses.php" method = "post">
    </select><br><br>
      <label style="color:DarkBlue;" for="month">Select month : </label>
    <select  id="month" name="month" >
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
      </select><br><br>

      <label for="details" style="color:DarkBlue";><center>Details</center></label><br>
      <textarea  type="text" id="details" name="details"   maxlength="120" size="150" value="details"></textarea><br><br>

      <label for="price" style="color:DarkBlue";><center>Price</center></label><br>
      <input style="width:30%;" min="0.00" max="10000.00" step="0.01" placeholder="0.01" type="number" id="price" name="price"  size="150" value=""></textarea><br><br>

      <button  type="submit" class="btn btn-primary btn-xs editbtn" name="submit"> Submit </button>

      <br><br><h3 style="color:White;"><Strong> <?php if (isset($_GET['error'])) {
         echo $_GET['error'];
       } ?>  </Strong></h3>

    </form>




</div>

<?php
if (isset($_POST['submit']) && !empty($_POST['details']) && !empty($_POST['price'])) {


      $date = $_POST['month'];
      $details = $_POST['details'];
      $price= $_POST['price'];


 $sql1 = "INSERT INTO expenses(date,details,price) VALUES ('$date','$details','$price')";

   if ($conn->query($sql1) === TRUE) {
header("Location:AdminExpenses.php?error=You created '$date' Expense");
} else{
 header("Location:AdminExpenses.php?error=New Expense Can not created.");
}}
elseif(isset($_POST['submit'])){
 header("Location:AdminExpenses.php?error=Fill in the blank areas.");
}
 ob_flush();?>


<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 33%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

</body>

</head>


</html>
