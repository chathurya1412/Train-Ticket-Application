<?php
session_start();
?>  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WELCOME</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="cat.css" />
  <!-- <link rel="stylesheet" href="./responsive.css" /> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <button class="btn btn-default" style="float: left; width: 100px;" name="submit2"><a href="feedback1.php" style="color:black">Logout</a></button>
  <div class="top-wrapper">
    <div class="container">
      
      <h2>WELCOME <?php echo $_SESSION['sess_user']; ?></h2><br>
      <h2>Home Page</h2>
      <h3>Click on the buttons below to Redirect to the respective pages</h3>
      
      <div class="btn-wrapper">
        <a href="profile.php" class="btn facebook">Profile</a>
        <a href="page1.php" class="btn facebook">Booking</a>
        <!-- <a href="transaction.html" class="btn facebook">Manage Transaction</a> -->
        <a href="wallet_mgmt.php" class="btn facebook">Wallet</a>
        
      </div>
    </div>
   </div> 
  
  <!-- <div class="right"><button class="button">
	 <a href="logout1.php"  style="color:black">Logout</a></button> 
</div><br> --> 
</body>
</html>
