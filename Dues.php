<!DOCTYPE html>
<html>
<head>
<title>Dues</title>
<?php include "DbConn.php";
session_start();?>
<link rel="stylesheet" href="background.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<style>
body{
  width: 98%;
  margin-left: auto;
  margin-right: auto;
}

.logout {
  position: absolute;
    border: 1px solid aqua;
    top: 70px;
    right: 15px;
}


</style>
<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>
<p style="color:White;">  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");?>

</div>


  <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

    <a href="Main.php">Main</a>

    <a class="active" href="Dues.php?id=<?php echo $_SESSION['id'];?>">Dues</a>

    <a href="Administration.php">Administration</a>

    <a href="Requests.php">Request</a>

    <a href="Expenses.php">Expenses</a>


    <div class="topnav-right" style="right::0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>

<div class="row">
   <div class="col-sm-2">

   </div>


   <div class="col-sm-8">




     <br><br>

       <?php



       $userid=$_GET['id'];
       $query = "SELECT * from userinfo where id='".$userid."'";
       $result = mysqli_query($conn, $query) or die ( mysqli_error());
       $row = mysqli_fetch_assoc($result);
       ?>

       <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Un-Paid Depts
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <table class="table table-bordered table-condensed table-hover">

               <thead>
                 <tr>

                   <th class="">Date</th>
                   <th class="">Users</th>
                   <th class="">Amount</th>
                   <th class="">Details</th>
                   <th class="">Status</th>
                   <th class="text-center">Payment</th>
                 </tr>
               </thead>
               <tbody>
                 <?php

                 $billing = $conn->query("SELECT d.*,u.fname,u.lname from dues d inner join userinfo u on u.id = d.user_id where user_id =$userid AND situation ='0' order by d.id asc");
                   while($row=$billing->fetch_assoc()):
                   ?>
                 <tr>


                   <td class="">
                      <p> <b><?php echo date("M, Y",strtotime($row['billing_date'])) ?></b></p>
                   </td>
                   <td class="">
                      <p> Name: <b><?php echo ucwords($row['fname']." ".$row['lname'] ) ?></b></p>
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
                      <span class="badge badge-secondary">Un-Paid</span>
                     <?php endif; ?>
                   </td>
                   <td class="text-center">
                      <a href="UserPay.php?id=<?php echo $row['id'];?>">
                     <button class="btn btn-sm btn-outline-success view_billing" type="button" onClick="return confirm('Aidatı ödemek istediğinizden emin misiniz?');">Pay</button> </a>
                   </td>
                 </tr>
                 <?php endwhile; ?>
               </tbody>
             </table>
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Paid Depts
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <table class="table table-bordered table-condensed table-hover">
          <thead>
            <tr>

              <th class="">Date</th>
              <th class="">User</th>
              <th class="">Amount</th>
              <th class="">Detail</th>
              <th class="">Status</th>
              <th class="text-center">Payment Date</th>
            </tr>
          </thead>
          <tbody>
            <?php

             $billing = $conn->query("SELECT d.*,u.fname,u.lname from dues d inner join userinfo u on u.id = d.user_id where user_id =$userid AND situation ='1' order by d.id asc");
              while($row=$billing->fetch_assoc()):
              ?>
            <tr>


              <td class="">
                 <p> <b><?php echo date("M, Y",strtotime($row['billing_date'])) ?></b></p>
              </td>
              <td class="">
                 <p> Name: <b><?php echo ucwords($row['fname']." ".$row['lname'] ) ?></b></p>
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
                 <span class="badge badge-secondary">Un-Paid</span>
                <?php endif; ?>
              </td>
              <td class="">
                 <p> <b><?php echo $row['payment_date'] ?></b></p>
              </td>

            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>








</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>
</head>
</html>
