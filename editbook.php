<?php
if(isset($_POST['edit']))
{
    if(!empty($_POST['book_id']))
    {
       session_start();
         if(!isset($_SESSION['sess_from']) && !isset($_SESSION['sess_user']) && !isset($_SESSION['sess_to']) && !isset($_SESSION['sess_depdate']) && !isset($_SESSION['sess_bookid'])){
               header("location:view1.php");
					exit();

   }     else {
   	$pattern = '/[ ]/';
    $string = "1998-11-09 15:00:00";
    //echo '<pre>', print_r( preg_split($pattern, $string), 1 ), '</pre>';
	//echo $string

?>
<!doctype html>

<html>
<head>
<title>Welcome</title>
<style>   
        body{  
   background-image: url("golden.jpg");      
       margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-size: 100%;
    background-attachment: fixed; 
    color: #261A15;
    font-family: 'Yantramanav', sans-serif;;  
    font-size: 100%;  
      
        }  
         h1 {  
    color: white;  
    font-family: verdana;  
    font-size: 100%;  
}  
         h2 {  
    color: white;  
    font-family: verdana;  
    font-size: 100%;  
}
         a {
    color: rgb(102, 51, 153);
}</style>  
<link rel="stylesheet" type="text/css" href="page.css">
<style>
table {
    border-collapse: collapse;
    width: 80%;
	color: #00332E;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
fieldset {
  background-color: black;
  color: white;
  opacity: 0.8;
}
</style>

</head>
<body>
 <center><h1><u> TRAIN TICKET RESERVATION SYSTEM </u></h1></center>
<br><br><h2>Train Details:</h2><br>
<form action="" method="POST">
	<legend>
    <fieldset>
	<center>
	<br><br>
<h2>Available Trains: </h2>

	<?php
//$aid=$_SESSION['sess_aid'];
//echo $aid;
 $con=@mysqli_connect('localhost','root','','traindb') or die(mysql_error());

	$depdate=$_SESSION['sess_depdate'];
	$user=$_SESSION['sess_user'];  
	$from=$_SESSION['sess_from'];
	$to=$_SESSION['sess_to'];
	$bookid=$_SESSION['sess_bookid'];
//	echo $depdate;
//	echo $to;
//	echo $from;

$sql="SELECT Train_ID,Dep_Time,Arr_Time,Train_Name,Src,Dstn,Dep_Date,Fare FROM trains WHERE Src='$from' and Dstn='$to' and Dep_Date='$depdate'";
//$sql="SELECT Flight_ID,Dep_Time,Arr_Time,Plane_Name,Src,Dstn,Fare,Dep_Date FROM Aircraft";

	if($result=mysqli_query($con,$sql))
	{
		$numrows=mysqli_num_rows($result);
    	if($numrows > 0){
			echo $numrows." Trains(s) Available..";
			echo "<br><br><table border='1'>";
			echo "<tr>";
			echo "<th>Train id</th>";
			echo "<th>Departure</th>";
			echo "<th>Arrival</th>";
			echo "<th>Seats</th>";
			echo "<th>Train_Name</th>";
			echo "<th>From</th>";
			echo "<th>To</th>";
			echo "<th>Fare</th>";
			
			
			echo "</tr>";
			while($row=mysqli_fetch_assoc($result)){ ?>

				<?php
					$pname= $row['Train_Name'];
					$seat_query = "SELECT Seats FROM tnames WHERE Train_Name='$pname'";
					$seats = mysqli_query($con,$seat_query);
					$seats1 = mysqli_fetch_assoc($seats);
					$tot_seats = (int)$seats1['Seats'];

					$fid=$row['Train_ID'];
					$var = $row['Dep_Time'];
					$booked_seats = "SELECT * FROM trains where Train_ID='$fid' and Dep_Time='$var'";//changed to aircraft from record
					$res = mysqli_query($con,$booked_seats);
					$numseats = mysqli_num_rows($res);
					$availSeats = $tot_seats-$numseats;


				?>

              <?php echo "<tr>";?>

			  <td><?php echo $row['Train_ID'];?></td>
			  <td><?php echo $row['Dep_Time'];?></td>
			  <td><?php echo $row['Arr_Time'];?></td>
			  <td><?php echo $availSeats;?></td>
			  <td><?php echo $row['Train_Name'];?></td>
			  <td><?php echo $row['Src'];?></td>
			  <td><?php echo $row['Dstn'];?></td>
			  <td><?php echo $row['Fare'];?></td>
			  
			  
			  <?php echo "</tr>";?>
<?php
                }
				echo "</table><br><br>";
				?><b> Train id: &ensp; &ensp; </b><input type="text" name="train_id"> &ensp; &ensp;
				<b> Dep_Time: &ensp; &ensp; </b><input type="text" name="dptime"> &ensp; &ensp;
				
				<input type="submit" value="save" name="save" />
			  <?php
	}

	mysqli_free_result($result);
}
else{
        echo "No planes matching your requirements were found.";

}

$user=$_SESSION['sess_user'];

if(isset($_POST['save']))
{
	if(!empty($_POST['train_id']) && !empty($_POST['dptime']))
	{
		$flight_id=$_POST['train_id'];
		$dptime=$_POST['dptime'];

  		$con=@mysqli_connect('localhost','root','','traindb') or die(mysql_error());


  					$result=mysqli_query($con,$sql);
  					$row=mysqli_fetch_assoc($result);


					$pname= $row['Train_Name'];
					$seat_query = "SELECT Seats FROM tnames WHERE Train_Name='$pname'";
					$seats = mysqli_query($con,$seat_query);
					$seats1 = mysqli_fetch_assoc($seats);
					$tot_seats = (int)$seats1['Seats'];

					$fid=$row['Train_ID'];
					$var = $row['Dep_Time'];
					$booked_seats = "SELECT * FROM trains where Train_ID='$fid' and Dep_Time='$var'";//we changed to aircraft from records
					$res = mysqli_query($con,$booked_seats);
					$numseats = mysqli_num_rows($res);
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


$sql="UPDATE records SET `Train_ID`='$fid', `Dep_Time`='$dptime' WHERE `User_Name`='".$_SESSION['sess_user']."' and `Book-ID`='".$_SESSION['sess_bookid']."' ;";
if (mysqli_query($con, $sql)) {
	echo "Record deleted successfully";
} else {
	echo "Error deleting record: ";
}

mysqli_close($con);}

   }}}}}
	?><br><br><br>
 <input type="button" value="Back" onclick="location.href='page1.php';" /><br><br>
 <!-- <input type="button" value="Proceed to Billing" onclick="location.href='payment_mgmt.php';" /><br><br> -->
</center>
<p align="right"> Page 2 </p>
</fieldset>
</legend>
</form>
</body>
</html>
