<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="background.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
session_start();
?>
<style>



label { display: block; width: 100px; }


form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {

  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color:#3396FF;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 5%;
}


button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  ;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 240px;
 height: 240px;
  border-radius: 40%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}


</style>
</head>


<body>
<title>login</title>


<h2 style="color:White;"> Login Form </h2>


<form action="Check.php" method="POST">
  <div class="imgcontainer">
    <img src="Mellon.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">

    <label for="usarname" style="color:White;"> Username</label>
    <input type="text" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" placeholder="Enter Username" name="username" required></br>

    <label for="password" style="color:White;"> Password</label>
    <input type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="Enter Password" name="password" id="myInput" required>
    <input type="checkbox" onclick="myFunction()">


    <div class="form-group">

         <label for="rememberme">Remember me</label>
         <input type="checkbox" name="remember" <?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?> />
        </div>



    <button type="submit" name="submit">Login</button>




    <?php if (isset($_GET['error'])) { ?>
    <p class="error"><strong><?php echo $_GET['error']; ?></strong></p>
  <?php } ?>

  </div>

  <div class="container" >
    <button name="cancel" type="reset"  class="cancelbtn"> Cancel </button>
    <!--  <span class="password">Forgot <a href="Forgot.php">password?</a></span>  -->


 </div>
</body>

</form>
<script>function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>

</html>
