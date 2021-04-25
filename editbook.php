<?php
session_start();
if(!isset($_SESSION['sess_user'])){  
   header("location:view1.php");
					exit();

   }  
	// $book_ID=$_POST["book_ID"];
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
        .loginBox
        {
	position: absolute;
	top: 55%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 350px;
	height: 800px;
	padding: 80px 40px;
	box-sizing: border-box;
	background: rgba(0,0,0,0.5);
        }

	</style>
    </head>
<!-- <body style="background-color: grey;"> -->
<body style="background-image:url(tree.jpg);background-repeat: no-repeat;background-size:cover;">
<button class="btn btn-default" style="float: left; width: 70px;" name="submit2"><a href="page1.php">Back</a></button>
<!-- <div class="wrapper"></div> -->
    <br>
	<h2 style="text-align: center;color:#ffffff;">Edit Information</h2>
	<?php
		
        $db=mysqli_connect("localhost","root","","traindb");
		$sql = "SELECT * FROM records WHERE User_Name='$_SESSION[sess_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$train=$row['Train_ID'];
			$dept=$row['Dep_Time'];
			$book=$row['Book_ID'];
		}

	?>
	<div class="form1">
    <div class="loginBox" style="padding-bottom: 15px; width:380px; height:595px;">
	<div class="profile_info" style="text-align: center; ">
		<span style="color: white; font-size:25px; font-weight:bold;">Welcome <?php echo $_SESSION['sess_user']; ?></span>	
	</div>
		<form action="" method="post" enctype="multipart/form-data">
		<label><h4><b>Book ID</b></h4></label>
		<input class="form-control" type="text" name="Book_ID" required >

		<label><h4><b>Train ID</b></h4></label>
		<input class="form-control" type="text" name="Train_ID" required >

		<label><h4><b>Departure Time</b></h4></label>
		<input class="form-control" type="text" name="Dept_Time" required>
		<br>
        <br>
		<div style="padding-left: 100px;">
		<button class="btn btn-default" type="submit" name="submit">Save</button></div>
	</form>
    </div>
</div>
<?php
    if(isset($_POST['submit']))
	{
    	$train=$_POST['Train_ID'];
		$dept=$_POST['Dept_Time'];
		$book=$_POST['Book_ID'];
		
		$sql2="SELECT * FROM records WHERE User_Name='$_SESSION[sess_user]' and Book_ID='$book'";
		$sql1= "UPDATE records SET `Train_ID`='$train', `Dep_Time`='$dept' WHERE `User_Name`='".$_SESSION['sess_user']."' and `Book_ID`='".$book."';";
		echo "ji";
		$result=mysqli_query($db,$sql2);
		$numrows=mysqli_num_rows($result);  
		if($numrows>0)
			{
				echo "ji";
				mysqli_query($db,$sql1);
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="view1.php";
					</script>
				<?php
			}
		else{
			?>
			<script type="text/javascript">
						alert("Enter Valid Booking Id");
						window.location="page1.php";
					</script>
				<?php
		}
	}
 ?>
</body>
</html>
    
