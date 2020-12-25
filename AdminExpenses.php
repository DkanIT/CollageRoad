<!DOCTYPE html>
<html>
<title>Expenses</title>
<head>


<body>
    <link rel="stylesheet" href="background.css">
    <link rel="stylesheet" href="UploadImage.css">
<style>
.vl {
  border-right:6px solid White;
   height:800px;

}


</style>
<h1 style="color:White;"> <Strong> Şenerler Apt. Management Page</Strong></h1>
<p style="color:White;"> <Strong>Welcome our webpage which you can follow our announcements and changes.</Strong></p>

<div style="border: 2px solid black;color:white;padding:10px;">

  <a><?php echo( "<button onclick= \"location.href='AdminMain.php'\">Main</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminDues.php'\">Dues</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminAdministration.php'\">Administration</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminRequests.php'\">Requests</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminExpenses.php'\">Expenses</button>");?></a>

  <a><?php echo( "<button onclick= \"location.href='AdminUsers.php'\">Users</button>");?></a>




</div>

</div>

<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "apptwebsite");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>


<div class="row">
  <div class="column">
    <h2 style="color:White; text-align:center;"> Archive </h2>
  <div class="vl">
    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "<img src='images/".$row['image']."'>";
        echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>

   </div>
    </div>

  <div class="column">
    <h2 style="color:DarkBlue; text-align:center;"> Current Balance </h2>
      <div class="vl">
    <a href="Eylül.jpg" target="_blank"><br>Current Balance</a>
    </div>
    </div>

  <div class="column">
    <h2 style="color:White; text-align:center;"> Update System </h2>

    <form method="POST" action="Expenses.php" enctype="multipart/form-data">
    	<input type="hidden" name="size" value="1000000">
    	<div>
    	  <input type="file" name="image">
    	</div>
    	<div>
        <textarea
        	id="text"
        	cols="40"
        	rows="4"
        	name="image_text"
        	placeholder="Say something about this image..."></textarea>
    	</div>
    	<div>
    		<button type="submit" name="upload">POST</button>
    	</div>
    </form>
    </div>

</div>





<meta name="viewport" content="width=device-width, initial-scale=1">



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
