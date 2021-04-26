
<?php
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'traindb' ) or die(mysqli_error($db));
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Forgot Password Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body style="background-image:url(https://image.shutterstock.com/image-illustration/retro-vintage-technology-old-train-260nw-105201944.jpg);">
		<div class="loginBox" style="padding-bottom: 15px; width:380px; height:495px;">
			<img src="download.png" class="user" height="100" width="100">
			<h2>Forgot Password</h2>
			<form action="forgot.php" method="post">
				<p>User Name</p>
				<input style="color:yellow;" type="text" name="Username" placeholder="Enter User Name">
				<p>New Password</p>
				<!-- <input style="color:yellow;" type="Password" name="pass" placeholder="Enter Password" id="myInput"> -->
				<input style="color:yellow;" type="Password" name="pass" placeholder="Enter Password" id="myInput" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
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
				<input type="submit" name="submit" value="Reset Password">
				<!-- <p class="signup">Didn't register?<a href="signup.php" style="color:blue;"> Signup</a></p><br> -->
                <p class="login">Login now<a href="login.php" style="color:blue;">Click here</a></p>         
			</form>
		</div>
	</body>
</html>
<?php
	$con=mysqli_connect("localhost","root","","traindb");
	//mysql_select_db("Practice")
	//if (isset($_POST['email']))

	if(isset($_POST['submit']))
	 {
		$Username = $_POST['Username'];
		$pass = $_POST['pass'];
	// 	$Username = $_POST['Username'];
	// 	$pass = $_POST['pass'];
       
    //     $query = "UPDATE customer SET Pswd = '$pass'
    //         WHERE User_Name = '$Username'";
    //                 $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    
        //              <!-- <script type="text/javascript">
        //     alert("Update Successful.");
        //     window.location = "login.php";
        // </script> -->
		$sql="SELECT * FROM customer WHERE User_Name='".$Username."' ";
    	$quer=mysqli_query($con,$sql);  
    	$numrows=mysqli_num_rows($quer);  
    	if($numrows!=0)  
    	{  
    		while($row=mysqli_fetch_assoc($quer))  
    		{  
    			// $dbename=$row['User_Name'];  
    			// $dbpassword=$row['Pswd'];  
				
    			$query = "UPDATE customer SET Pswd = '$pass' WHERE User_Name = '$Username'";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    echo "<p style='color:yellow;'>" ." Password has been updated, login now". "</p>";
					header("Location: login.php");
					
        //               <!-- <script type="text/javascript">
        //     alert("Update Successful.");
        //     window.location = "login.php";
        // </script>
		 
			}	
		}
		else
		{
			$message = "Username incorrect.\\nTry again.";  echo "<script type='text/javascript'>alert('$message');</script>";
			//echo "<p style='color:yellow;'>" ." Wrong username try again". "</p>";
		}
	}
?>		

