<!DOCTYPE html>
<html>
<head>
  <title>Expenses</title>
  <?php include "DbConn.php";
  session_start();

  $page1=1;

  if(isset($_GET['page'])){
  $page =$_GET['page'];

  if($page == "1"){
    $page1=0;
  }
  else{
    $page1 = ($page*7)-7;
  }

  }
  else{
    $page1=0;
  }?>

  <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="background.css">
<body>

  <style >
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
.vl {
  border-right:6px solid White;
 height:720px;

}
td {
background-color: white;
border: 2px solid #dddddd;
  color: black;
  padding: 6px;

text-align: center;}
  th {
  background-color:  #80bdce;
  border: 2px solid #dddddd;
    color: white;
    padding: 8px;
  text-align: center;
  }

</style>

<h1 > <Strong>Şenerler Apt. Management Page </Strong></h1>
<p >  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");?>

</div>


  <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

    <a href="Main.php">Main</a>

    <a href="Dues.php?id=<?php echo $_SESSION['id'];?>">Dues</a>

    <a href="Administration.php">Administration</a>

    <a  href="Requests.php">Request</a>

    <a class="active" href="Expenses.php">Expenses</a>


    <div class="topnav-right" style="right::0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>


<div class="row">
  <div class="col-4">
        <div class="vl">
      <br>
            <h2 style="text-align:center;"> Balance Details </h2>

                  <?php
                  $result = mysqli_query($conn, "SELECT SUM(amount) AS paid_sum FROM dues WHERE  situation ='1' ");
                  $row = mysqli_fetch_assoc($result);
                  $paid = $row['paid_sum']; // Total paid of this.month

                  $result = mysqli_query($conn, "SELECT SUM(amount) AS amount_sum FROM dues WHERE situation ='0'");
                  $row = mysqli_fetch_assoc($result);
                  $unpaid = $row['amount_sum'];
                  $total=$paid+$unpaid;

                  $result1 = mysqli_query($conn, "SELECT SUM(amount) AS expenses_sum FROM expenses ");
                  $row1 = mysqli_fetch_assoc($result1);
                  $expensesum = $row1['expenses_sum'];

                  $currentbalance=$paid-$expensesum;



          ?><center>
            <div class="card-group">
            <div class="card text-white bg-primary mb-2" style="max-width:12rem;">
  <div class="card-body">
    <h5 class="card-title">Expected Income</h5>
    <p class="card-text"><?php echo number_format($total,2)."₺"; ?></p>
  </div>

</div>
<div class="card text-white bg-success mb-2" style="max-width: 12rem;">
    <div class="card-body">
    <h5 class="card-title">Paid Depts</h5>
    <p class="card-text"><?php echo number_format($paid,2)."₺"; ?></p>
  </div>
</div>
<div class="card text-white bg-danger mb-2" style="max-width: 12rem;">
  <div class="card-body">
    <h5 class="card-title">Unpaid Depts</h5>
    <p class="card-text"><?php echo number_format($unpaid,2)."₺"; ?></p>
  </div>
</div>
</div>
<div class="card-group" style="margin-left:15%">
  <div class="card  text-white bg-info  mb-2" style="max-width: 12rem;">
  <div class="card-body">
    <h5 class="card-title">Total Expense </h5>
  <p class="card-text"><?php echo number_format($expensesum,2)."₺"; ?></p>
  </div>
  </div>
<div class="card text-white  bg-info  mb-2" style="max-width:12rem;">
<div class="card-body">
<h5 class="card-title">Current Balance</h5>
<p class="card-text"><?php echo number_format($currentbalance,2)."₺"; ?></p>
</div>

</div>


</div>



    <div style="margin-top:-6%;" id = "container" >


    <script type = 'text/javascript' src = 'https://www.gstatic.com/charts/loader.js'> </script>
    <script type = 'text/javascript'>  google.charts.load('current', {packages: ['corechart']}); </script>


              <script language = 'JavaScript'>
                var paid = <?php echo $paid ?>;
                var unpaid = <?php echo  $unpaid ?>;
                var sum = <?php echo $total ?>;
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
                       'title':'Total Payment Graph',
                       'width':500,
                       'height':500,
                       pieHole: 0.40,
                       'backgroundColor':''

                    };

                    // Instantiate and draw the chart.
                    var chart = new google.visualization.PieChart(document.getElementById('container'));
                    chart.draw(data, options);
                 }
                  google.charts.setOnLoadCallback(drawChart);
              </script>


     </div>
     </center>
      </div>
    </div>

  <div class="col-8">
      <br>
  <h2 style="margin-right: 10px;text-align:center;"> Expense Details </h2>


  <div class="card-body">
       <center>
    <div class="row">
       <div class="col-md-8 " >
         <form class="form-group" action="userfilterexpenses.php" method="post">

         <div class="col-md-4 offset-md-3" >
           <label for="" class="control-label">Date</label>
           <input style="width:100%;" type="month" class="form-control" name="month"  value="<?php echo isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) :date('Y-m'); ?>" required>
         </div>
         <div class="col-md-2 " style="margin-top:-4.3em;margin-left:80%;" >
               <label for="" class="control-label">&nbsp</label>
               <button  style="width:105%;" class="btn btn-primary btn-block " id="filter" type="">Filter</button>

               </div>
             </form>
                    </div>
                      </div>
                    </center>
                        </div>

            <hr>
              <hr>
  <table class="table table-bordered table-condensed table-hover">
    <thead>
    <tr>

      <th class="">Date</th>
      <th class="">Details</th>
      <th class="">Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $month = isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) : date('Y-m') ;
    $expenses = $conn->query("SELECT expense_date,details,amount  from expenses  where expense_date='".$month."-01'  order by expense_date asc limit $page1,7");
    $expensecounter = $conn->query("SELECT expense_date,details,amount  from expenses  where expense_date='".$month."-01'  order by expense_date asc");

    $count = mysqli_num_rows($expensecounter);
     $a =$count/7;
     $a = ceil($a);


      while($row=$expenses->fetch_assoc()):
      $chk =  $conn->query("SELECT expense_date,details,amount from expenses  where expense_date='".$month."-01'  order by expense_date asc")->num_rows;
       ?>
    <tr>

      <td class="">
         <p class="text-left"> <b><?php echo (date('M, Y',strtotime($month)))?></b></p>
      </td>
      <td class="">
         <p class="text-left"> <b><?php echo $row['details']?></b></p>
      </td>
       <td class="">
          <p class="text-left"> <b><?php echo number_format($row['amount'],2)."₺"  ?></b></p>
       </td>


    </tr>
    <?php endwhile; ?>
  </tbody>
  </table>
  <?php
  for($b=0;$b < $a;$b++) {
  ?> <a href="AdminExpenses.php?month=<?php echo $month; ?>&page=<?php echo $b+1; ?>" style="text-decoration:none;"><?php echo $b+1; ?></a> <?php
  }
  ?>




  </div>



    </div>




<meta name="viewport" content="width=device-width, initial-scale=1">



<style>
* {
  box-sizing: border-box;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</body>

</head>

</html>
