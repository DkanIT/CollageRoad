<!DOCTYPE html>
<html>
<head>
<title>Forgot</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="background.css">
<style>

form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {

  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;

  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
    text-align: center;
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


.imgcontainer {
  text-align: center;
  margin: auto;
  width: 50%;
}

img.avatar {
  width: 240px;
 height: 240px;
  border-radius: 40%;
}

.container {
  padding: 16px;
  text-align: center;
}


</style>
</head>


<body>

<h2 style="color:DarkBlue;" > Forgot Password </h2>


<form action="login.php" method="POST">
  <div class="imgcontainer">
    <img src="Mellon.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
<form action="includes/Reset-password.php" method="post">
    <label for="usarname" style="color:White;"> </label>
    <input type="text" placeholder="Enter Username" name="username" required></br>

    <label for="email" style="color:White;"> </label>
    <input type="text" placeholder="Enter Mail" name="email" required></br>

    <button type="submit" name="reset-request-sent">Submit</button>


</form>

  </div>

</body>

</form>


</html>
