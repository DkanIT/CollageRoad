		<?php
		session_start();
		include 'dbconn.php';
		$update=false;
		$usertype = '';
		$uname = '';
		$pass='';
		$cpass='';
		$fname ='';
		$lname ='';
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




				$sql = mysqli_query($conn,"SELECT * FROM userinfo WHERE doornumber='$doornumber'");
		  if(mysqli_num_rows($sql)==1){
				header("Location:AdminUsers.php?error=Room is Full.");
			}
			 elseif($cpass != $pass){

						header("Location:AdminUsers.php?error=Passwords not match.");
			 }

		    else{

		    $sql = "INSERT INTO userinfo(usertype,doornumber, username, password, fname, lname, mail, phone,create_date) VALUES ('$usertype','$doornumber','$uname',md5('$pass'),'$fname','$lname','$mail','$phone','$date')";


		    if ($conn->query($sql) === TRUE) {
		      $sql = "INSERT INTO dues(doornumber,fname,lname) VALUES ('$doornumber','$fname','$lname')";
		      if ($conn->query($sql) === TRUE) {
		header("Location:AdminUsers.php?error=You created '$uname'");
		}
		} else {
		    header("Location:AdminUsers.php?error=New User Can not created.");}


		}}
		elseif(isset($_POST['submit']) ){

		  header("Location:AdminUsers.php?error=Fill in the Blanks.");
		}


		//UPDATE
		if (isset($_POST['update']) && !empty($_POST['phone'])  && !empty($_POST['usertype']) && !empty($_POST['username'])&& !empty($_POST['password'])&& !empty($_POST['cpassword'])&& !empty($_POST['fname']) &&
	 !empty($_POST['lname']) &&!empty($_POST['mail']) && !empty($_POST['doornumber']))  {

 $uid=$_GET['id'];
 $usertype = $_POST['usertype'];
 $uname = $_POST['username'];
 $pass= $_POST['password'];
 $cpass= $_POST['cpassword'];
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $mail = $_POST['mail'];
 $phone = $_POST['phone'];
 $doornumber = $_POST['doornumber'];


/*$query = "SELECT * from userinfo where id!='$uid'";

	 if(mysqli_num_rows($query)==1){
 header("Location:AdminUsers.php?error=Room is Full.");
}*/
 if($pass != $cpass){
			header("Location:AdminUsers.php?error=Passwords not match.");
 }

else{
		 $sql = "UPDATE userinfo SET doornumber='$doornumber', username='$uname', password='$pass', fname='$fname', lname='$lname', mail='$mail', phone='$phone'  WHERE id='$uid'";
		 $query_run = mysqli_query($conn,$sql);
		 header("Location:AdminUsers.php?error=User Updated.");
}

}elseif(isset($_POST['update']) ){

	 header("Location:AdminUsers.php?error=Fill in the Blanks.");
 }





		?>
