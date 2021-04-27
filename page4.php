<?php
session_start();
if(!isset($_SESSION['sess_from']) && !isset($_SESSION['sess_user']) && !isset($_SESSION['sess_to']) && !isset($_SESSION['sess_depdate'])){
   header("location:home.php");
					exit();

   } else {
    $user=$_SESSION['sess_user'];
    if(!empty($_POST['train_id']) && !empty($_POST['dptime']))
	{
		$train_id=$_POST['train_id'];
		$dptime=$_POST['dptime'];
		
		// $payment = $_POST['Booking_Method'];

  		$con=@mysqli_connect('localhost','root','','traindb') or die(mysql_error());


  					$result=mysqli_query($con,$sql);
  					$row=mysqli_fetch_assoc($result);


					$pname= $row['Train_Name'];
					$seat_query = "SELECT Seats FROM tnames WHERE Train_Name='$pname'";
					$seats = mysqli_query($con,$seat_query);
					$seats1 = mysqli_fetch_assoc($seats);
					$tot_seats = (int)$seats1['Seats'];

					
					if($fid==$train_id && $var==$dptime)
					{
					$train_id=$row['Train_ID'];
					$dptime = $row['Dep_Time'];
					$booked_seats = "SELECT * FROM trains where Train_ID='$train_id' and Dep_Time='$dptime'";//we changed to aircraft from records
					$res = mysqli_query($con,$booked_seats);
					$numseats = mysqli_num_rows($res);
					if(!$numseats)
					{
						echo "Enter valid TrainId or Departure time";
					}
					$availSeats = $tot_seats-$numseats;
		//echo $availSeats;





  		if ($availSeats==0){
		?>
		<script>
			window.alert('Seats completely filled.. Press Back..');
			window.history.back();
		</script>
		<?php
	}


	else{
		//$today = strtotime('today');
		$today = date('Y-m-d H:i:s');


$sql="INSERT INTO records (Train_ID,Dep_Time,Book_Time,User_Name) values('$fid','$dptime','$today','$user')";
$sql1 = "SELECT Book_ID FROM records WHERE Train_ID='$fid' AND Dep_Time='$dptime' AND Book_Time='$today'";
	if ($result=mysqli_query($con, $sql)) {

		if ($result1=mysqli_query($con, $sql1)){

			$row1=mysqli_fetch_assoc($result1);
			$bookid= $row1['Book_ID'];

	$_SESSION['sess_user']=$user;
	// $_SESSION['sess_aid']=$aid;
	$_SESSION['sess_bookid']=$bookid;

	// header("Location: page3.php");// changed for payment
}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);}
					}
				   else{
					echo "Enter valid Train ID or Departure Time" ;
				}
					

   }

   }