<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    if ($_SESSION["sess_user"]==""){
		?>
		<script>
			window.alert('login first');
			window.history.back();
		</script>
		<?php 
	}
}	    
?> 
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Feedback Page</title>
		<link rel="stylesheet" href="feedback1.css" />
	</head>
	<body style="background-image:url(https://image.shutterstock.com/image-illustration/retro-vintage-technology-old-train-260nw-105201944.jpg); background-repeat: no-repeat;background-size:cover;">
		<div class="loginBox" style="padding-bottom: 30px; width:380px; height:465px; padding-top:50px;">
			<h2>Feedback</h2>
			<form action="" method="post">
				<h3 style="color:yellow; ">Please enter your Feedback<br><?php echo $_SESSION['sess_user']; ?></h3>
				<br>
				<p>Ratings</p><br>
				<div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
                </div>
                <br><br><br><br>
                <p>Feedback</p>
				<input style="color:yellow;" type="text" name="feedback" placeholder="Enter your feedback" required>
                <br><br>
				<input type="submit" name="submit" value="Submit"><br><br>    
                <p><a href="login.php" style="color:white;"> Skip For Now</a></p>    
			</form>
            </div>
		</div>
        </body>
</html>

<?php  
    if(isset($_POST["submit"]))
    {  
        
        if(!empty($_POST['rate']) && !empty($_POST['feedback']))
        { 
           
            $rate=$_POST['rate'];
            $feedback=$_POST['feedback'];
            $user=$_SESSION['sess_user'];
           
            $con=@mysqli_connect('localhost','root','','traindb') or die(mysql_error());  
  
            // $sql="SELECT * FROM feedback WHERE `username`='".$_SESSION['sess_user']."';";
            // $query=mysqli_query($con,$sql);  
            // $numrows=mysqli_num_rows($query);  
            //if($numrows==0)  
            //{  
                // $sql = "CALL insert_cust('$emp','$emppass','$emailid','$phone','$age');";
//                 INSERT INTO table_name (column1, column2, column3, ...)
// VALUES (value1, value2, value3, ...);
                $sql="INSERT INTO feedback (username,review, rating) 
                VALUES('$user','$feedback', '$rate'); ";
                //$sql="INSERT INTO Customer VALUES('$emp','$emppass','$emailid','$phone','$age');";  
                //$sql.="INSERT INTO airport(airportid) VALUES('$aid');";
  
                $result=mysqli_multi_query($con,$sql);  
                if($result)
                { 
                    ?>
					<script type="text/javascript">
						alert("feedback Received.. Thank You..");
						window.location="logout1.php";
					</script>
				<?php 
                } 
                else 
                {  
                 echo "<p style='color:yellow;'>" ." Failure! Username already exists! Please try again with another.". "</p>";
                } 
  
            //} 
            //else 
            //{  
            //    echo "That Employee name already exists! Please try again with another.";  
            //}  
            
        }
        else 
        {  
            echo "All fields are required!";  
        }
        
    }  
    
?>  