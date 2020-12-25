<!DOCTYPE html>
<title>Users</title>
<html>
<?php include "DbConn.php"; ?>
<title>Create User</title>
<head>

  <link rel="stylesheet" href="background.css">
<body>

<style>

.table {
font-family: arial, sans-serif;
border-collapse: collapse;
font-size: 20px;
position: absolute;
text-align: center;
font-size: 18px;
border-style: solid;
border-width: 5px;
border-left: 6px solid white;
border-right: 6px solid white;
background-color: lightgray;
position: absolute;
top:30%;
left: 25%;
width: 50%;
text-align: center;

}
.cancelbtn {
  padding: 14px 20px;
  background-color: darkblue;
}
.signupbtn {
  padding: 14px 20px;
  background-color: aqua;
}
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
  bottom: 10%;
  text-align: center;
  font-family: fantasy;
  font-size: 20px;
  text-color:white;
}

h2 {
  background-color: aqua;
  text-align: center;

}

</style>
<h1 style="color:White;"> <Strong>Şenerler Apt. Management Page </Strong></h1>



</div>


<p style="color:White";> <Strong>Welcome our webpage which you can follow our announcements and changes.</Strong></p>

<div style="border: 2px solid black;color:white;padding:10px;">


  <a><?php echo( "<button onclick= \"location.href='AdminMain.php'\">Main</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminDues.php'\">Dues</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminAdministration.php'\">Administration</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminRequests.php'\">Requests</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminExpenses.php'\">Expenses</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminUsers.php'\">Users</button>");?></a>


  </div>

<div class="table">

  <h2> User Create Form </h2>


<form action="AdminCreateUser.php" method = "post">




      <input type="radio" id="admin" name="usertype" value="admin">
      <label for="admin">Admin</label>
      <input type="radio" id="user" name="usertype" value="user">
      <label for="user">User</label><br><br>

      <label for="doornumber" style="color:Black";></label>
      <input type="text"   id="phone" name="doornumber"  style="text-align:center;" maxlength="5" size="10" placeholder="Door Number" value=""><br><br>

  <label for="username" style="color:Black";></label>
  <input type="text"  id="username" name="username" style="text-align:center;" maxlength="15" size="15"  placeholder="Enter Username" value=""><br><br>

  <label for="password" style="color:Black;";></label>
  <input type="password"  id="password" name="password" style="text-align:center;" maxlength="15" size="15" placeholder="Enter Password" value="">

  <label for="cpassword" style="color:Black;";></label>
  <input type="password"  id="cpassword" name="cpassword" style="text-align:center;" maxlength="15" size="15" placeholder="Password Again" value=""><br><br>

  <label for="fname" style="color:Black";></label>
  <input type="text"  id="fname"  name="fname"   style="text-align:center;" maxlength="15" size="15" placeholder="Write user's Name" value="">

  <label for="lname" style="color:Black";></label>
  <input type="text"  id="lname"  name="lname"   style="text-align:center;" maxlength="15" size="15" placeholder="Write user's Surname" value=""><br><br>


  <label for="mail" style="color:Black";></label>
  <input type="mail"   id="mail" name="mail"  style="text-align:center;" size="25" placeholder="Enter mail address" value=""><br><br>

  <label for="phone" style="color:Black";></label>
  <input type="text"   id="phone" name="phone" style="text-align:center;" maxlength="10" size="25" placeholder="Enter Phone Number without 0" value=""><br><br>






      <br><br>

      <button type="submit" name="submit" class="signupbtn"> SUBMİT </button>
      <input type="button" onclick="location.href='AdminUsers.php';" class="cancelbtn" value="CANCEL" />



</form>
<?php
   if (isset($_POST['submit']) && !empty($_POST['phone'])  && !empty($_POST['usertype']) && !empty($_POST['username'])&& !empty($_POST['password'])&& !empty($_POST['cpassword'])&& !empty($_POST['fname']) &&
  !empty($_POST['lname']) &&!empty($_POST['mail']) && !empty($_POST['doornumber']))  {


         $usertype = $_POST['usertype'];
         $uname = $_POST['username'];
         $pass= $_POST['password'];
         $cpass= $_POST['cpassword'];
         $fname = $_POST['fname'];
         $lname = $_POST['lname'];
         $mail = $_POST['mail'];
         $phone = $_POST['phone'];
         $doornumber = $_POST['doornumber'];

     if($pass != $cpass){
       echo "Passwords are not match";
    }
    else{



    $sql = "INSERT INTO userinfo(usertype,doornumber, username, password, fname,lname,mail,phone) VALUES ('$usertype','$doornumber','$uname',md5('$pass'),'$fname','$lname','$mail','$phone')";

    if ($conn->query($sql) === TRUE) {
  echo "<br>New User Create successfully";
} else {
    echo "New User can not Create ";
}}

  }elseif(isset($_POST['submit']) ){

    echo "Fill in the blanks on form.";
}
  ?>


</div>

</body>
</head>

</html>
