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
<body style="background-image:url(https://image.shutterstock.com/image-illustration/retro-vintage-technology-old-train-260nw-105201944.jpg);">
		<div class="loginBox" style="padding-bottom: 15px; width:380px; height:495px;">
			<img src="download.png" class="user" height="100" width="100">
			<h2>Login</h2>
			<form action="login.php" method="post">
				<p>User Name</p>
				<input style="color:yellow;" type="text" name="Username" placeholder="Enter User Name">
				<p>Password</p>
				<input style="color:yellow;" type="Password" name="pass" placeholder="Enter Password" id="myInput">
				<input type="checkbox" onclick="myFunction()" style="width:20px;"><b style="color:white;">Show Password</b>

           <script>
              function myFunction() {
               var x = document.getElementById("myInput");
               if (x.type === "password") {
               x.type = "text";
               } 
			   else {
              x.type = "password";
               }
            }
            </script>
				<input type="submit" name="submit" value="Login">
				<p class="signup">Not yet registered?<a href="signup.php" style="color:blue;"> Signup</a></p><br>
                <p class="forgot">Forgot your Password?<a href="forgot.php" style="color:blue;">Click here</a></p>         
			</form>
		</div>
	</body>

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

