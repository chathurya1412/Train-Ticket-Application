<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
        .wrapper
 		{
 			/* width: 300px;
 			margin: 0 auto; */
 			color: white;
			font-size:20px;
			position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 600px;
            padding: 80px 40px;
             box-sizing: border-box;
             background: rgba(0,0,0,0.5);
			 
 		}
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
<body style="background-image:url(tree.jpg);background-repeat: no-repeat; background-size:cover;">
<!-- <div class="wrapper"></div> -->

	<h2 style="text-align: center;color: 	#ffffff;">Edit Information</h2>
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
	<!-- <div class="wrapper"> -->
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
		<label><b>Upload your identity information</label><br><br>
        <input type="file" name="file" style="color: white" required><br>
		<br>
        <br>
        <br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
	<!-- <div class="wrapper"></div> -->
</div>

	<?php 

		if(isset($_POST['submit']))
		{
			// move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$emailid=$_POST['Email'];
			$phone=$_POST['Phone'];
			$address=$_POST['Address'];
			$filename=$_FILES['file']['name'];
			$destination = 'uploads/' . $filename;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
			$file = $_FILES['file']['tmp_name'];
			
			
			$sql1= "UPDATE customer SET `Email`='$emailid', `Phone`='$phone', `Address`='$address',`name`='$filename' WHERE `User_Name`='".$_SESSION['sess_user']."';";
			if (!in_array($extension, ['zip', 'pdf', 'docx','jpeg','jpg','png']))
            {
                echo "You file extension is not allowed";
            } 
            move_uploaded_file($file, $destination);
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

