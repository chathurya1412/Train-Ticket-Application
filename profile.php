<?php 
	// 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
 	</style>
 </head>
 <body style="background-color: #004528; ">
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
 			<div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['sess_user']; ?>
	 			</h4>
 			</div>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> username: </b>";
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
 			?>
 		</div>
 	</div>
 </body>
 </html>
