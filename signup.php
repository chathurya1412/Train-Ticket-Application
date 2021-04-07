<!doctype html>  
<html>  
<head>  
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Customer Register</title>
    <style>
    body{
        background-image: url("train.jpg");
        background-size: 100%;
    background-attachment: fixed;
    }
    </style>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style1.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'> 
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
<body style=" color: yellow;);"> 
    <br> <br>
    <center><h1 style="color:white;"><u> TRAIN TICKET RESERVATION SYSTEM </u></h1></center>
    <center><h2 style="color:white;">User Registration Form</h2></center>
    <form action="" method="POST" enctype="multipart/form-data">  
    <div class="booking-form-box" style="border: 0px solid black;">
    <div class="booking-form"  style=" background: rgba(0,0,0,0.5); width:490px;">
        <label>Username</label><br>
        <input type="text" name="emp" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" placeholder="username" required><br>
        <b>(please enter valid Username for KYC approval)</b><br>
        <!-- <input type="text" name="emp" placeholder="username" required><br> -->

        <label>Email-id</label><br>
        <input type="email" name="emailid" placeholder="email-id" id="email" required><br>
        <!-- <input type="email" class="input-field" placeholder="Email Id" name="emailid" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Sorry, only letters, numbers, periods(.) and '@' are allowed."><br> -->
        <label>phone</label><br>
        <input type="text" name="phone" placeholder="phone" onkeypress='return restrictAlphabets(event)' pattern="\d{10}" maxlength="10" required><br>

        <label>Age</label><br>
        <input type="number" name="age" placeholder="age" min="18" max="120" oninput="validity.valid||(value='');" required><br>

        <label>Aadhar Number</label><br>
        <input type="text" name="Aadhar_No" placeholder="aadhar number" onkeypress='return restrictAlphabets(event)' pattern="\d{12}" maxlength="12" required><br>

        <label>Upload your identity information</label><br>
        <input type="file" name="file" required><br>
        
        <label>Address</label><br>
        <input type="text" name="address"placeholder="address" required><br>

        <label>Gender</label><br>
        <!-- <input type="text" name="gender" placeholder="gender" required><br>
        <label>Please enter M for male, F for female and O for others</label> -->
        <select id="gender" name="gender">
          <option value="F">Female</option>
          <option value="M">Male</option>
          <option value="O">Others</option>
        </select><br>

        <label>password</label><br>
        <input type="text" name="emppass" placeholder="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
        <label>confirm password</label><br>
        <input type="text" name="empconf" placeholder="confirm-password" required><br><br>
        <!--<label>Upload your ID proof</label>
    <input type="file" id="myFile" name="filename" required>-->
        <div class="input-grp">
        <input style="color:white;" type="submit" value="Submit" name="submit" /> 
        </div><br>
        <label><b>Already have an account?</b><a href="login.php">Sign in</a></p></label>
        </div>
    </div> 
</form>  

<?php  
    if(isset($_POST["submit"]))
    {  
        
        if(!empty($_POST['emp']) && !empty($_POST['emailid']) && !empty($_POST['phone'])&& !empty($_POST['emppass']) && !empty($_POST['empconf']) && !empty($_POST['age'])&& !empty($_POST['address'])&& !empty($_POST['gender'])&& !empty($_POST['Aadhar_No']))
        { 
           
            $emp=$_POST['emp'];
            $emailid=$_POST['emailid'];
            $phone=$_POST['phone'];
            $age=$_POST['age'];
            $emppass=$_POST['emppass'];  
            $empconf=$_POST['empconf'];
            $gender=$_POST['gender'];
            $address=$_POST['address'];
            $Aadhar_No=$_POST['Aadhar_No'];

            $filename=$_FILES['file']['name'];

            $destination = 'uploads/' . $filename;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            
            $file = $_FILES['file']['tmp_name'];
            // $size = $_FILES['filename']['size'];
            if (!in_array($extension, ['zip', 'pdf', 'docx','jpeg','jpg','png']))
            {
                echo "You file extension is not allowed";
            } 
            move_uploaded_file($file, $destination);
            // else {
                // move the uploaded (temporary) file to the specified destination
            //     if (move_uploaded_file($file, $destination)) {
            //         $sql = "INSERT INTO customer (filename) VALUES ('$filename')";
            //         if (mysqli_query($conn, $sql)) {
            //             echo "File uploaded successfully";
            //         }
            //     } else {
            //         echo "Failed to upload file.";
            //     }
            // }

            if ($emppass != $empconf)
            {
                echo("Error... Passwords do not match");
                exit;
            }
            $con=@mysqli_connect('localhost','root','','traindb') or die(mysql_error());  
  
            $sql="SELECT * FROM Customer WHERE User_Name='".$emp."'";
            $query=mysqli_query($con,$sql);  
            $numrows=mysqli_num_rows($query);  
            //if($numrows==0)  
            //{  
                // $sql = "CALL insert_cust('$emp','$emppass','$emailid','$phone','$age');";
//                 INSERT INTO table_name (column1, column2, column3, ...)
// VALUES (value1, value2, value3, ...);
                $sql="INSERT INTO Customer (User_Name,Pswd,Email,Gender,Phone,Age,Aadhar_No,Address,name) 
                VALUES('$emp','$emppass','$emailid','$gender','$phone','$age','$Aadhar_No','$address','$filename'); ";
                //$sql="INSERT INTO Customer VALUES('$emp','$emppass','$emailid','$phone','$age');";  
                //$sql.="INSERT INTO airport(airportid) VALUES('$aid');";
  
                $result=mysqli_multi_query($con,$sql);  
                if($result)
                { 
                    ?>
					<script type="text/javascript">
						alert("User Account Successfully Created.. Please Login..");
						window.location="login.php";
					</script>
				<?php 
                //echo "<p style='color:yellow;'>" . "User Account Successfully Created.. Please Login.."  . "</p>";  
                //header("Location: login.php");
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
</body>  
</html>   
