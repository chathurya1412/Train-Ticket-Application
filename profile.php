<?php 
	// 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
	    /* html{
			scroll-behaviour:smooth;
		} */
	 
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
 	</style>
 </head>
 <!-- <body style="background-color:grey; "> -->
 <body style="background-image:url(tree.jpg); 
  background-repeat: no-repeat; background-size:cover;">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
			 <button class="btn btn-default" style="float: left; width: 70px;" name="submit2"><a href="home.html">Back</a></button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
				$db=mysqli_connect('localhost','root','','traindb');
 				// $q=mysqli_query($db,"SELECT * FROM customer where `User_Name`='$_SESSION['sess_user']' ");
				$sql="SELECT * FROM customer WHERE `User_Name`='".$_SESSION['sess_user']."';";
                $q=mysqli_query($db,$sql);
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				// echo "<div style='text-align: center'>
 				// 	<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'>
 				// </div>";
 			?>
 			<div style="text-align: center;"> <b>Welcome <?php echo $_SESSION['sess_user']; ?> </b>
	 			
 			</div>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Username: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['User_Name'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email-ID: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Phone Number:</b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Phone'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Gender:</b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Gender'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Age:</b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Age'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Aadhar Number:</b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Aadhar_No'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Address:</b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Address'];
	 					echo "</td>";
	 				echo "</tr>";


 				echo "</table>";
 				echo "</b>";
				echo"<br>";
				echo"<b>Your file is being processed for KYC purposes</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>
