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
    <script type="text/javascript">
         /*code: 48-57 Numbers*/
         function restrictAlphabets(e) {
             var x = e.which || e.keycode;
             if ((x >= 48 && x <= 57))
                 return true;
             else
                 return false;
         }
      </script>
</head>
<!-- <body style="background-color: grey;"> -->
<body style="background-image:url(tree.jpg);">


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

	<div class="profile_info" style="text-align: center; ">
		<span style="color: white; font-size:25px; font-weight:bold;">Welcome <?php echo $_SESSION['sess_user']; ?></span>	
		
	</div><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">


		<label><h4><b>Email </b></h4></label>
		<input class="form-control" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required name="Email" >

		<label><h4><b>Phone</b></h4></label>
		<input class="form-control" type="text" name="Phone" onkeypress='return restrictAlphabets(event)' pattern="\d{10}" maxlength="10" >

		<label><h4><b>Address</b></h4></label>
		<input class="form-control" type="text" name="Address" required>

		<br>
        <br>
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

