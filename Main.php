<!DOCTYPE html>
<html>
<head>


<title>Main</title>

<link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="background.css">
<?php include "DbConn.php";
session_start();?>
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
img{
  border-radius: 40%;
}
.vl {
  border-right:6px solid White;
   height:800px;
   weight:00px;
}
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
.carousel {
  margin-top: 50px;
}


.carousel-inner {
  height: 300px;
}


.carousel-caption {
  color: #000;
  top: 60%;
}

.carousel-control-next-icon,
.carousel-control-prev-icon {
  filter: invert(100%);
}
</style>
<body>

  <h1 > <Strong>Şenerler Apt. Management Page </Strong></h1>
  <p >  <Strong>Welcome to our webpage which you can follow our announcements and changes. </Strong></p>
  <div class="user"><?php
  echo("Mae govannen ".$_SESSION['fname']." " .$_SESSION['lname']."<br>");?>

  </div>


    <div class="topnav" style="border: 2px solid black;color:white;padding:10px;">

      <a class="active" href="Main.php">Main</a>

      <a href="Dues.php?id=<?php echo $_SESSION['id'];?>">Dues</a>

      <a href="Administration.php">Administration</a>

      <a href="Requests.php">Request</a>

      <a href="Expenses.php">Expenses</a>

      <div class="topnav-right" style="right::0;">
      <a  href="Login.php">Logout</a>

    </div>

    </div>

    <div class="row">
      <div class="col-sm-4">
        <br><center><img  src="Manager.jpeg" width=280 height=320>
        <p style="color:black";> Manager of this year: Doğukan Şener <br>Communication:dogukansener991@gmail.com or 05153231132</p>
        <b> <p style="color:red;"> Don't call after "9 pm"</p></b> </center>

          <?php
        $userid=  $_SESSION['id'];
        $billing = $conn->query("SELECT d.* from dues d inner join userinfo u on u.id = d.user_id where user_id =$userid AND situation ='0'");
        $row = mysqli_num_rows($billing);

        if($row == 0){?>
          <div class="alert alert-success alert-dismissible" style="max-width:100%;margin-left:5%;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Well done! You have already paid all depts. </strong>
      </div>
    <?php } else { ?>
      <div class="alert alert-danger alert-dismissible" style="max-width:100%;margin-left:5%;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Danger!</strong> You have unpaid depts. Please check due page.
      </div>
  <?php   } ?>

        </div>

      <div class="col-sm-8">

        <div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php $ret=mysqli_query($conn,"SELECT * FROM announcement");
        $i=0;
        while($row=mysqli_fetch_array($ret)) {
            $actives = '';
            if($i == 0){
              $actives = 'active';
            }
              ?>
            <div class="carousel-item <?=$actives; ?>">
              <div class="carousel-caption">
                <h1 class="display-5" style="margin-top:8%;"><?php echo $row['announcement'];?><br><small><?php echo "Admin: ".$row['adminnick'];?></small></h1>
              </div>
            </div>
              <?php $i=$i+1; }?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <center><canvas id="canvas" width="350" height="350"
        style="background-color:">
      </canvas></center>

    </div>



    </div>

    </body>

    <script>
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    var radius = canvas.height / 2;
    ctx.translate(radius, radius);
    radius = radius * 0.90
    setInterval(drawClock, 1000);

    function drawClock() {
      drawFace(ctx, radius);
      drawNumbers(ctx, radius);
      drawTime(ctx, radius);
    }

    function drawFace(ctx, radius) {
      var grad;
      ctx.beginPath();
      ctx.arc(0, 0, radius, 0, 2*Math.PI);
      ctx.fillStyle = 'white';
      ctx.fill();
      grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
      grad.addColorStop(0, '#333');
      grad.addColorStop(0.5, 'white');
      grad.addColorStop(1, '#333');
      ctx.strokeStyle = grad;
      ctx.lineWidth = radius*0.1;
      ctx.stroke();
      ctx.beginPath();
      ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
      ctx.fillStyle = '#333';
      ctx.fill();
    }

    function drawNumbers(ctx, radius) {
      var ang;
      var num;
      ctx.font = radius*0.15 + "px arial";
      ctx.textBaseline="middle";
      ctx.textAlign="center";
      for(num = 1; num < 13; num++){
        ang = num * Math.PI / 6;
        ctx.rotate(ang);
        ctx.translate(0, -radius*0.85);
        ctx.rotate(-ang);
        ctx.fillText(num.toString(), 0, 0);
        ctx.rotate(ang);
        ctx.translate(0, radius*0.85);
        ctx.rotate(-ang);
      }
    }

    function drawTime(ctx, radius){
        var now = new Date();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();
        //hour
        hour=hour%12;
        hour=(hour*Math.PI/6)+
        (minute*Math.PI/(6*60))+
        (second*Math.PI/(360*60));
        drawHand(ctx, hour, radius*0.5, radius*0.07);
        //minute
        minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
        drawHand(ctx, minute, radius*0.8, radius*0.07);
        // second
        second=(second*Math.PI/30);
        drawHand(ctx, second, radius*0.9, radius*0.02);
    }

    function drawHand(ctx, pos, length, width) {
        ctx.beginPath();
        ctx.lineWidth = width;
        ctx.lineCap = "round";
        ctx.moveTo(0,0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    </head>

    </html>
