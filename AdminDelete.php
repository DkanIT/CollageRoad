<?php
	include 'dbconn.php';
//DELETE
if(isset($_GET['id'])) {
  if($_GET['id']==$_SESSION['kullanıcıid']){
   header("Location:AdminUsers.php?error=You can't Delete yourself.");
}else{
$uid=$_GET['id'];

$date = date('Y-m-d H:i:s');
 $sql = "UPDATE userinfo SET doornumber='NULL' ,status='inactive' ,delete_date='$date' WHERE id ='$uid'";

 $query_run = mysqli_query($conn,$sql);


    $userdoor = mysqli_query($conn,"SELECT * FROM  userinfo WHERE id ='$uid'");
    $row = mysqli_fetch_assoc($userdoor);
    $doornumberr=$row['doornumber'];
    $msg1=mysqli_query($conn,"delete from dues where doornumber='$doornumberr'");


header("Location:AdminDeletedUsers.php");

}

 }
?>
