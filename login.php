<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
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
</html>
<?php
    session_start();
	$con=mysqli_connect("localhost","root","","traindb");
	
	//mysql_select_db("Practice")
	//if (isset($_POST['email']))
	if(isset($_POST['submit']))
	{
		$Username = $_POST['Username'];
		$pass = $_POST['pass'];
		$sql="SELECT * FROM customer WHERE User_Name='".$Username."' AND Pswd='".$pass."'";
    	$query=mysqli_query($con,$sql);  
    	$numrows=mysqli_num_rows($query);  
    	if($numrows!=0)  
    	{  
    		while($row=mysqli_fetch_assoc($query))  
    		{  
    			
				$phone=$row['Phone'];
				$age=$row['Age'];
				$address=$row['Address'];
				$gender=$row['Gender'];
				$no=$row['Aadhar_No'];
				$emailid=$row['Email'];
    		}  
  
    		  
    			  
    			$_SESSION['sess_user']=$Username;
				$_SESSION['p']=$phone;
				$_SESSION['a']=$age;
				$_SESSION['add']=$address;
				$_SESSION['g']=$gender;
				$_SESSION['adhar']=$no;
				$_SESSION['email']=$emailid;

     
    			/* Redirect browser changed from profile.php*/  
    			header("Location: home.html");  
    		  
    	} 
		
		

    	else 
    	{  
    		echo "Invalid username or password!";  
    	}  
  }


	

 ?>


