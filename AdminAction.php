		<?php
		session_start();
		include 'dbconn.php';
		$update=false;
		$usertype =  '';
		$uname =  '';
		$pass=  '';
		$cpass=  '';
		$fname =  '';
		$lname = '';
		$mail =  '';
		$phone =  '';
		$doornumber = '';

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
						 $date = date('Y-m-d H:i:s');
		          //$status = $_POST['status'];
		$sql = mysqli_query($conn,"SELECT * FROM userinfo WHERE doornumber='$doornumber'");
		     if($pass != $cpass){
		         header("Location:AdminUsers.php?error=Passwords not match.");
		    }

		  if(mysqli_num_rows($sql)==1){
		header("Location:AdminUsers.php?error=Room is Full.");
		}

		    else{



		    $sql = "INSERT INTO userinfo(usertype,doornumber, username, password, fname, lname, mail, phone,date) VALUES ('$usertype','$doornumber','$uname',md5('$pass'),'$fname','$lname','$mail','$phone','$date')";


		    if ($conn->query($sql) === TRUE) {
		      $sql = "INSERT INTO dues(doornumber,fname,lname) VALUES ('$doornumber','$fname','$lname')";
		      if ($conn->query($sql) === TRUE) {
		header("Location:AdminUsers.php?error=You created '$uname'");
		} else {
		    header("Location:AdminUsers.php?error=New User Can not created.");
		}}


		}}elseif(isset($_POST['submit']) ){

		  header("Location:AdminUsers.php?error=Fill in the Blanks.");
		}


		//UPDATE
		if (isset($_POST['update']) && !empty($_POST['phone'])  && !empty($_POST['usertype']) && !empty($_POST['username'])&& !empty($_POST['password'])&& !empty($_POST['cpassword'])&& !empty($_POST['fname']) &&
	 !empty($_POST['lname']) &&!empty($_POST['mail']) && !empty($_POST['doornumber']))  {


 $sql = mysqli_query($conn,"SELECT * FROM userinfo WHERE doornumber='$doornumber'");
			if($pass != $cpass){
					header("Location:AdminUsers.php?error=Passwords not match.");
		 }

	 if(mysqli_num_rows($sql)==1){
 header("Location:AdminUsers.php?error=Room is Full.");
 }

	 $date = date('Y-m-d H:i:s');
		 $sql = "INSERT INTO deletedusers(usertype,doornumber, username, password, fname, lname, mail, phone,date,lastdate) WHERE id='$id' VALUES('$date')";




}elseif(isset($_POST['update']) ){

	 header("Location:AdminUsers.php?error=Fill in the Blanks.");
 }

 //DELETE
 if(isset($_GET['id'])) {
	 if($_GET['id']==$_SESSION['kullanıcıid']){
		header("Location:AdminUsers.php?error=You can't Delete yourself.");
}else{
 $adminid=$_GET['id'];
 $user = mysqli_query($conn,"INSERT INTO deletedusers SELECT * FROM  userinfo WHERE id ='$adminid'");

 $date = date('Y-m-d H:i:s');
	$sql1 = "UPDATE deletedusers SET lastdate='$date' WHERE id =$adminid";

	$query_run1 = mysqli_query($conn,$sql1);


	 	 $userdoor = mysqli_query($conn,"SELECT * FROM  userinfo WHERE id ='$adminid'");
		 $row = mysqli_fetch_assoc($userdoor);
		 $doornumberr=$row['doornumber'];
		 $msg=mysqli_query($conn,"delete from userinfo where id='$adminid'");
	 	 $msg1=mysqli_query($conn,"delete from dues where doornumber='$doornumberr'");


 header("Location:AdminDeletedUsers.php");

}

  }


		?>
