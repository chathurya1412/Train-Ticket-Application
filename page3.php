<?php   
session_start();
if(!isset($_SESSION['sess_user']) && !isset($_SESSION['sess_aid']) && !isset($_SESSION['sess_bookid'])){  
   header("location:page2.php");
					exit();

   } else {  
 
?>  <!doctype html>  

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
    color: white;
    font-family: 'Yantramanav', sans-serif;;  
    font-size: 100%;  
      
        }  
         h1 {  
    color: white;  
    font-family: verdana;  
    font-size: 100%;  
}
         a {
    color: white;
}</style>  
<link rel="stylesheet" type="text/css" href="page.css">
<style>
fieldset {
  background-color: black;
  color: white;
  opacity: 0.8;
}
h2{
	color: white;
}
p{color: white;}
table {
    border-collapse: collapse;
    width: 80%;
	color: #00332E;
	opacity: 1;

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
</style>

</head>  
<body>  
 <center><h1> TRAIN TICKET RESERVATION SYSTEM </h1></center>

<div class="right"><button class="button">
	<a href="feedback1.php"  style="float: right; width: 70px; color:black; " >Logout</a></button>
	<br>
	<button class="button">
	<a href="page1.php"  style="float: right; width: 70px; color:black; " >Book Another Train</a></button>
	
	
</div><br><br><br> 
<form action="" method="POST">  	
	<legend>  
    <fieldset>
	<center>
	<br>
	<b><p>Successfully Booked</p></b>
	<br>
	<h2>Booked Train Details : </h2><br>
	<?php
	$bookid=$_SESSION['sess_bookid'];
	$con=@mysqli_connect('localhost','root','','traindb') or die(mysql_error());  
  
$sql="SELECT * from records WHERE Book_ID=$bookid";
	if($result=mysqli_query($con,$sql)){
	$numrows=mysqli_num_rows($result);  
    if($numrows > 0){
echo "<table border='1'>";
		echo "<tr>";
		echo "<table border='1'>";
		echo "<tr>";
		echo "<th>Username</th>";
		echo "<th>Booking id</th>";
		echo "<th>Departure date</th>";
		echo "<th>Pyment Type</th>";
		echo "<th>Pid</th>";
		echo "<th>Pickup</th>";
		echo "<th>Destination</th>";
		//echo "<th>Email</th>";
		echo "<th>Fare</th>";
		echo "</tr>";
		while($row=mysqli_fetch_assoc($result)){ 

			$deptime = $row['Dep_Time'];    
            $trainid = $row['Train_ID'];
            $query1="SELECT * from trains where Dep_Time='$deptime' AND Train_ID='$trainid'"; // changed to records from aircraft
            $result1=mysqli_query($con,$query1);    
			$row1=mysqli_fetch_assoc($result1);
                ?>
              <?php echo "<tr>";?>
              <td><b><?php echo $row['User_Name'];?></b></td>
			  <td><?php echo $row['Book_ID'];?></td>
			  <td><b><?php echo $row['Dep_Time'];?></b></td>
			  <td><b><?php echo $row['Payment_Type'];?></b></td>			  
			  <td><?php echo $row['Train_ID'];?></td>
			  <td><b><?php echo $row1['Src'];?></b></td> 
			  <td><b><?php echo $row1['Dstn'];?></b></td>
			  <td><b><?php echo $row1['Fare'];?></b></td>
			  <?php echo "</tr>";?>
<?php			  
                }
				echo "</table>";
	}
	mysqli_free_result($result);
//}
}
	?>
	
	<!--<br><br> <input type="submit" value="Cancel Flight" name="cancel" /><br><br>-->
	<!--<br><br><input type="submit" value="Cancel Flight" name="cancel" onclick="myFunction()"/>-->

<p id="demo"></p>

<script>
function myFunction() {
    var txt;
    if (confirm("Cancel Flight..??") == true) {
        txt = "Flight Cancelled!";
    } else {
        txt = "Flight Was Not Cancelled!";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>



	<?php
	$user=$_SESSION["sess_user"];
	if(isset($_POST["cancel"])){
	
  $con=@mysqli_connect('localhost','root','','traindb') or die(mysql_error());  

  $sql="CALL Cancel";
  if (mysqli_query($con, $sql)) {
    echo "Successfully Canceled";
	$_SESSION['sess_user']=$user;
	
	header("Location: page1.php");  
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);}


	

   }
	?>
	</center>
<p align="right"> Page 3 </p>
</fieldset>  
</legend>
</form>
</body>  
</html>

