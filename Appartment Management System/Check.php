<?php
session_start();
include "Dbconn.php";
if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])) {
        header("Location:login.php?error=Kullanıcı adı ve parola gerekli.");

}
    else {
      $user = $_POST['username'];
      $password = md5($_POST['password']);
      $cookiepass = ($_POST['password']);

      $sql = mysqli_query($conn,"SELECT * FROM userinfo WHERE username='$user' AND password='$password' AND status='active'");


  if(mysqli_num_rows($sql)==1){

      $qry = mysqli_fetch_array($sql);
      $_SESSION['username'] = $qry['username'];
      $_SESSION['id'] = $qry['id'];
      $_SESSION['password'] = $qry['password'];
      $_SESSION['usertype'] = $qry['usertype'];
      $_SESSION['fname'] = $qry['fname'];
      $_SESSION['lname'] = $qry['lname'];
      $_SESSION['kullanıcıid'] = $qry['id'];

      if(!empty($_POST["remember"]))
       {
        setcookie ("username",$user,time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("password",$cookiepass,time()+ (10 * 365 * 24 * 60 * 60));
      //$_SESSION["username"] =$qry['username'];
      }
        else
       {
        if(isset($_COOKIE["username"]))
        {
         setcookie ("username","");
        }
        if(isset($_COOKIE["password"]))
        {
         setcookie ("password","");
          }
       }
      if($qry['usertype']=="admin"){
      header("location:AdminMain.php");}
      else if($qry['usertype']=="user"){
            header("location:Main.php");
        }}




        else{
            header("Location:login.php?error=Hatalı Kullanıcı adı veya parola");
            exit();
        }
        mysqli_close($conn);
    }
}

?>
