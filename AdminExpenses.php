<!DOCTYPE html>
<html>
<title>Expenses</title>
<head>
  <?php include "DbConn.php";ob_start();
  $month = isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) : date('Y-m') ;
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
  }
  ?>

<body>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<link rel="stylesheet" href="background.css">

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
    background-color: #80bdce;
  border: 2px solid #dddddd;
    color: white;
    padding: 8px;
  text-align: center;}


</style>
<h1 > <Strong>Şenerler Apt. Management Page </Strong></h1>
<p >  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
<div class="user"><?php session_start();
echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");
?>

</div>


  <div class="topnav" style="border: 2px solid black;padding:10px;">

    <a href="AdminMain.php">Main</a>

    <a href="AdminDues.php">Dues</a>

    <a href="AdminAdministration.php">Administration</a>

    <a href="AdminRequests.php">Request</a>

    <a class="active" href="AdminExpenses.php">Expenses</a>

    <a href="AdminUsers.php">Users</a>



    <div class="topnav-right" style="right:0;">
    <a  href="Login.php">Logout</a>

  </div>

  </div>

<div class="row">
  <div class="col-3" >

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
          <div class="card-group" style="margin-right: 40px;margin-left: 0px">
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
  <div class="card-group" style="margin-right: 40px; ">
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

<div style="margin-top:-8%;margin-left:-10%;" id = "container" >


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
  <div class="col-6">

      <div class="vl">
        <br>
    <h2 style="margin-right: 10px;text-align:center;"> Expense Details </h2>
    <div style="width:90%;">



      <div class="card-body">
           <center>
        <div class="row">
           <div class="col-md-8 " >
             <form class=" form-group" action="filterexpenses.php" method="post">

             <div class="col-md-4 offset-md-3" >
               <label for="" class="control-label">Date</label>
               <input style="width:130%;" type="month" class="form-control" name="month"  value="<?php echo isset($_GET['month']) ? date('Y-m',strtotime($_GET['month'].'-01')) :date('Y-m'); ?>" required>
             </div>
             <div class="col-md-2 " style="margin-top:-4.3em;margin-left:80%;" >
                   <label for="" class="control-label">&nbsp</label>
                   <button  style="width:105%;" class="btn btn-primary btn-block " id="filter" type="">Filter</button>

                   </div>
                        </div>
                          </div>
                        </center>
                            </div>

     						<hr>
    <table class="table table-bordered table-condensed table-hover" style="width:108%">
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
    </div>


  <div class="col-md3" >
      <br>
    <center><h3><b>Add Payment<b></h3>
   <span class="">
      <form class="p-3 mb-2 text-dark" action="addexpense.php" method="post">

        <div>
           <label  for="" class="control-label">Date</label>
             <input  style="width:45%" type="month" value="<?php echo isset($_GET['expense_date']) ? date('Y-m',strtotime($_GET['expense_date'].'-01')) :date('Y-m'); ?>" class="form-control" name="expense_date">
       </div>
        <div  >
          <label for="" class="control-label">Amount</label>
          <input type="text" style="width:30%" class="form-control" name="amount" id="exampleInputPassword1" placeholder="₺">
        </div>
        <div>
          <label for="" class="control-label">Details</label>
          <textarea type="textarea"  rows="6" cols="50" size="150" class="form-control" name="detail" id="exampleInputPassword1" placeholder="Açıklama"></textarea>

        </div>
        <br>
        <div>
          <button style="" class="btn btn-primary btn-block btn-sm col-sm-2" type="" id="new_expense" onClick="return confirm('Borç eklemek istediğinize emin misiniz?');"> <i class="fa fa-plus"> Add Bill</i></button>
        </div>

        </form>
      </center>
</span>


</div>


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
