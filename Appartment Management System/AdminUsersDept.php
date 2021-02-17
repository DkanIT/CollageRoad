<!DOCTYPE html>
<title>Users</title>
<html>
<head>
  <title>Users</title>

<?php include "DbConn.php";
session_start();

$gid=$_GET['id'];
 $query = "SELECT * from userinfo where id='".$gid."'";
 $result = mysqli_query($conn, $query) or die ( mysqli_error());
 $row = mysqli_fetch_assoc($result);

?>
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
      <div class="col-sm-2">
      </div>
      <div class="col-sm-8">

        <section id="main-content">
        <section class="wrapper">
          <h3><?php echo ucwords($row['fname']);?>'s Payments</h3> <br>

      <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-condensed table-hover">
                    <!-- <colgroup>
                      <col width="2%">
                      <col width="10%">
                      <col width="10%">
                      class="btn btn-primary btn-block"
                      <col width="15%">
                      <col width="20%">
                      <col width="15%">
                      <col width="10%">
                    </colgroup> -->
                    <thead>
                      <tr>

                        <th class="">Date</th>
                        <th class="">User</th>
                        <th class="">Amount</th>
                        <th class="">Details</th>
                        <th class="">Status</th>
                        <th class="text-center">Ödeme</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $billing = $conn->query("SELECT d.*,u.fname,u.lname from dues d inner join userinfo u on u.id = d.user_id  where user_id =$gid order by situation asc");
                        while($row=$billing->fetch_assoc()):
                        ?>
                      <tr>


                        <td class="">
                           <p> <b><?php echo date("M, Y",strtotime($row['billing_date'])) ?></b></p>
                        </td>
                        <td class="">
                           <p> İsim: <b><?php echo ucwords($row['fname']." ". $row['lname']) ?></b></p>
                        </td>
                        <td class="">
                           <p class="text-right"> <b><?php echo number_format($row['amount'],2)."₺" ?></b></p>
                        </td>
                        <td class="">
                           <p class="text-left"> <b><?php echo $row['detail']?></b></p>
                        </td>
                        <td class="">
                          <?php if($row['situation'] == 1): ?>
                           <span class="badge badge-success">Paid</span>
                          <?php else: ?>
                           <span class="badge badge-secondary">Unpaid</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-center">
                           <?php if($row['situation'] == 0): ?>
                           <a href="Adminuserpay.php?id=<?php echo $row['id'];?>">
                          <button class="btn btn-sm btn-outline-primary view_billing" type="button" onClick="return confirm('Borcu ödemek istediğinizden emin misiniz?');">Pay</button> </a>
                           <?php else: ?>
                             <a href="">
                             <button class="btn btn-sm btn-outline-danger view_billing" type="button" style="background-color:red;color:white;" disabled>Paid</button> </a>
                             <?php endif; ?>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
            </div>
  </section>
  </section>
      </div>
    </div>






</body>
</head>
</html>
