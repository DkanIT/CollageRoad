<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="background.css">
  <link rel="stylesheet" href="login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
session_start();
?>

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

         <label style="color:White;" for="rememberme">Remember me</label>
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
