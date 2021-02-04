<!DOCTYPE html>
<html>
<head>
  <title>Dues</title>
  <?php include "DbConn.php";
  session_start();
  ob_start();
  $month = isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) : date('Y-m') ;
  $page1=1;

  if(isset($_GET['page'])){
  $page =$_GET['page'];

  if($page == "1"){
    $page1=0;
  }
  else{
    $page1 = ($page*10)-10;
  }

  }
  else{
    $page1=0;
  }
  ?>




    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type = 'text/javascript' src = 'https://www.gstatic.com/charts/loader.js'></script>
    <script type = 'text/javascript'>google.charts.load('current', {packages: ['corechart']});</script>
      <link rel="stylesheet" href="background.css">

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

<body>
  <h1> <Strong>Şenerler Apt. Management Page </Strong></h1>
  <p >  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
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
      <a   href="Login.php">Logout</a>

    </div>

    </div>



    <br><br>
     <div class="row">
       <div class="col-md-4">

       </div>


       <div class="col-md-8" style="margin-left:15%;">
         <div class="container-fluid">
         <style>
         	input[type=checkbox]
         {
           /* Double-sized Checkboxes */
           -ms-transform: scale(1.5); /* IE */
           -moz-transform: scale(1.5); /* FF */
           -webkit-transform: scale(1.5); /* Safari and Chrome */
           -o-transform: scale(1.5); /* Opera */
           transform: scale(1.5);
           padding: 10px;
         }
         </style>

         		<div class="row">

               <?php if (isset($_GET['error'])) { ?>
                          <p style="z-index:1;margin-left:43%;color:red"class="error"><?php echo $_GET['error']; } ?></p>
         			<div class="col-md-12">

         				<div class="card"  style="margin-top:-3%;background-color: #e5eef4 !important;">
         					<div class="card-header">
                     <h3><b>Add Payment<b></h3>
         						<span class="">
                       <form class="p-3 mb-2 text-dark" action="adddue.php" method="post">

                         <div class="col-md-2 offset-md-3">
                   					<label  for="" class="control-label">Date</label>
                     					<input style="width:105%" type="month" value="<?php echo isset($_GET['billing_date']) ? date('Y-m',strtotime($_GET['billing_date'].'-01')) :date('Y-m'); ?>" class="form-control" name="billing_date">
                   			</div>
                         <div class="col-md-2 offset-md-5" style="margin-top:-4.3em;">
                           <label for="" class="control-label">Amount</label>
                           <input type="text" class="form-control" name="amount" id="exampleInputPassword1" placeholder="₺">
                         </div>
                         <div class="col-md-2 offset-md-7" style="margin-top:-4.3em;">
                           <label for="" class="control-label">Details</label>
                           <input type="text" class="form-control" name="detail" id="exampleInputPassword1" placeholder="Açıklama">

                         </div>
                         <div class="col-md-7 offset-md-9" style="margin-top:-2em;">
                           <button style="" class="btn btn-primary btn-block btn-sm col-sm-2" type="" id="new_billing" onClick="return confirm('Borç eklemek istediğinize emin misiniz?');"> <i class="fa fa-plus">&nbsp Add Dept</i></button>
                         </div>

                         </form>
         				</span>
         					</div>
         					<div class="card-body">
                       <h3><b>Monthly Dues Table<b></h3>
         						<div class="row form-group">
                       <div class="col-md-8 offset-md-3" style="margin-left:36.5%;">
                         <form class="" action="filterdue.php" method="post">
                           <div class="col-md-2 float-left" id = "container" style = "width: 550px; min-height: 100px; margin-left:-50%;">
              </div>
                         <div class="col-md-4 offset-md-3">
                           <label for="" class="control-label">Date</label>
                           <input type="month" class="form-control" name="month"  value="<?php echo isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) :date('Y-m'); ?>" required>
                         </div>
                         <div class="col-md-2 offset-md-7" style="margin-top:-4.3em;">
                               <label for="" class="control-label">&nbsp</label>
                               <button class="btn btn-primary btn-block " id="filter" type="">Filter</button>

                               </div>
                               <?php
                                                   $result = mysqli_query($conn, "SELECT SUM(amount) AS amount_sum FROM dues WHERE date_format(billing_date,'%Y-%m') = '$month'");
                                                   $row = mysqli_fetch_assoc($result);
                                                   $sum = $row['amount_sum']; // Total debt of this.month

                                                   $result = mysqli_query($conn, "SELECT SUM(amount) AS paid_sum FROM dues WHERE date_format(billing_date,'%Y-%m') = '$month' AND situation ='1' ");
                                                   $row = mysqli_fetch_assoc($result);
                                                   $paid = $row['paid_sum']; // Total paid of this.month

                                                   if($paid == ""){
                                                     $paid = 0;
                                                   }

                                                   $unpaid = $sum-$paid;


                                                   ?>


                      <script type = 'text/javascript' src = 'https://www.gstatic.com/charts/loader.js'> </script>
                      <script type = 'text/javascript'>  google.charts.load('current', {packages: ['corechart']}); </script>


                                 <script language = 'JavaScript'>
                                   var paid = <?php echo $paid ?>;
                                   var unpaid = <?php echo $unpaid ?>;
                                   var sum = <?php echo $sum?>;

                                    function drawChart() {
                                       // Define the chart to be drawn.
                                       var data = new google.visualization.DataTable();
                                       data.addColumn('string', 'Browser');
                                       data.addColumn('number', 'Percentage');
                                       data.addRows([
                                          ['Expected payment amount',0],
                                          ['Unpaid ', unpaid],
                                          ['Chrome',0],
                                          ['Paid', paid],
                                          ['Opera', 0],
                                          ['Others', 0]
                                       ]);

                                       // Set chart options
                                       var options = {
                                          'title':'<?php echo date('M, Y',strtotime($month)).' Payment Graph'; ?>',
                                          'width':550,
                                          'height':300,
                                          pieHole: 0.40,
                                          'backgroundColor':'#e5eef4'
                                       };

                                       // Instantiate and draw the chart.
                                       var chart = new google.visualization.PieChart(document.getElementById('container'));
                                       chart.draw(data, options);
                                    }
                                     google.charts.setOnLoadCallback(drawChart);
                                 </script>
                           </form>
                         </div>

                       </div>
         						<hr>
         						<table class="table table-bordered table-condensed table-hover">
         						         							<thead>
         								<tr>

         									<th class="">Date</th>
         									<th class="">User</th>
         									<th class="">Amount</th>
         									<th class="">Details</th>
         									<th class="">Situation</th>
         									<th class="">Pay Date</th>
         									<th class="text-center">Payment</th>
         								</tr>
         							</thead>
         							<tbody>
         								<?php
                        $month = isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) : date('Y-m') ;
                        $billing = $conn->query("SELECT d.*,u.fname,u.lname from dues d inner join userinfo u on u.id = d.user_id where date_format(d.billing_date,'%Y-%m') = '$month' order by situation asc limit $page1,10");
                        $billingcounter = $conn->query("SELECT d.*,u.fname,u.lname from dues d inner join userinfo u on u.id = d.user_id where date_format(d.billing_date,'%Y-%m') = '$month' order by d.id asc");

                        $count = mysqli_num_rows($billingcounter);
                         $a =$count/10;
                         $a = ceil($a);


         									while($row=$billing->fetch_assoc()):
         									$chk =  $conn->query("SELECT d.*,u.fname,u.lname from dues d inner join userinfo u on u.id = d.user_id where date(d.billing_date) > '".$month."-01' and d.id != '".$row['id']."' and d.id = '".$row['id']."' order by date(d.billing_date) asc")->num_rows;
                           ?>
                       	<tr>


         									<td class="">
         										 <p> <b><?php echo date("M, Y",strtotime($row['billing_date'])) ?></b></p>
         									</td>
         									<td class="">
         										 <p> Name: <b><?php echo ucwords($row['fname']." ".$row['lname']) ?></b></p>
         										         									</td>
         									<td class="">
         										 <p class="text-left"> <b><?php echo number_format($row['amount'],2)."₺" ?></b></p>
         									</td>
                           <td class="">
                              <p class="text-left"> <b><?php echo $row['detail']?></b></p>
                           </td>
         									<td class="">
         										<?php if($row['situation'] == 1): ?>
         										 <span class="badge badge-success">Paid</span>
         										<?php else: ?>
         										 <span class="badge badge-secondary">Un-Paid  </span>
         										<?php endif; ?>
         									</td>
                           <td class="">
                              <p class="text-left"> <b><?php echo ($row['payment_date'])?></b></p>
                           </td>
         									<td class="text-center">
                             <?php if($row['situation'] == 0): ?>
                             <a href="Adminpay.php?id=<?php echo $row['id'];?>">
         										<button class="btn btn-sm btn-outline-primary view_billing" type="button" onClick="return confirm('Borcu ödemek istediğinizden emin misiniz?');">Pay</button> </a>
                             <?php else: ?>
                               <a href="">
                               <button class="btn btn-sm btn-outline-danger view_billing" style="color:white;background:Red" type="button" disabled>Paid</button> </a>
                               <?php endif; ?>
         										<?php if($chk <= 0): ?>
         										<?php endif; ?>
         									</td>
         								</tr>
         								<?php endwhile; ?>
         							</tbody>
         						</table>
                    <?php
                   for($b=0;$b < $a;$b++) {
                   ?> <a href="AdminDues.php?month=<?php echo $month; ?>&page=<?php echo $b+1; ?>" style="text-decoration:none;"><?php echo $b+1; ?></a> <?php
                   }
                    ?>
         					</div>
         				</div>
         			</div>
         			<!-- Table Panel -->
         		</div>
         	</div>
          <?php
                                                    $result = mysqli_query($conn, "SELECT SUM(amount) AS amount_sum FROM dues WHERE situation ='0'");
                                                    $row = mysqli_fetch_assoc($result);
                                                    $sum = $row['amount_sum'];
                                                    $sql2 = mysqli_query($conn,"UPDATE expenses SET price='$sum' WHERE date='UnpaidDepts' ");

                                                    $result = mysqli_query($conn, "SELECT SUM(amount) AS paid_sum FROM dues WHERE  situation ='1' ");
                                                    $row = mysqli_fetch_assoc($result);
                                                    $paid = $row['paid_sum']; // Total paid of this.month
                                                    $sql3 = mysqli_query($conn,"UPDATE expenses SET price='$paid' WHERE date='CurrentBalance' ");
                                                    $unpaid = $sum-$paid;


                                                    ?>


         </div>
         <style>
         	td{
         		vertical-align: middle !important;
         	}
         	td p{
         		margin: unset
         	}
         	img{
         		max-width:100px;
         		max-height: :150px;
         	}
         </style>



       </div>
     </div>



</div>
</div>
</body>
</head>
</html>
