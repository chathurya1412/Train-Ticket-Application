<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body style="background-color: #004528;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
        $db=mysqli_connect("localhost","root","","traindb");
		$sql = "SELECT * FROM customer WHERE User_Name='$_SESSION[sess_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$emailid=$row['Email'];
			$phone=$row['Phone'];
			$address=$row['Address'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['sess_user']; ?></h4>
		<button class="btn btn-default" style="float: left; width: 70px;" name="submit2"><a href="home.html">Back</a></button>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">


		<label><h4><b>Email </b></h4></label>
		<input class="form-control" type="text" name="Email" required >

		<label><h4><b>Phone</b></h4></label>
		<input class="form-control" type="text" name="Phone"required >

		<label><h4><b>Address</b></h4></label>
		<input class="form-control" type="text" name="Address" required>

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			// move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$emailid=$_POST['Email'];
			$phone=$_POST['Phone'];
			$address=$_POST['Address'];

			$sql1= "UPDATE customer SET `Email`='$emailid', `Phone`='$phone', `Address`='$address' WHERE `User_Name`='".$_SESSION['sess_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>
