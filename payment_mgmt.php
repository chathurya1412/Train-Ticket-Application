<!-- payment / wallet management:
amount 
payment method -->
<?php
$db = mysqli_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'traindb' ) or die(mysqli_error($db));
session_start();
if(!isset($_SESSION['sess_user'])){  
   header("location:home.php");
    exit();
}

                $user=$_SESSION['sess_user'];
    
                $type_query = "SELECT * FROM wallet WHERE username='$user';";
                $result = $db->query($type_query);
         
                $amtt=0;
                
                while($rows=$result->fetch_assoc())
                {
                    $amtt=$amtt+$rows['wallet_amt'];
             ?>
                <!-- <tr>
                  <td><?php echo $rows['Type'];?></td>  
                </tr> -->
                <?php
                }
                ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment_mgmt.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Payment Management</title>
    
</head>
<body>
    <div id="header">
        <!-- Payment Management -->
        <h1 class=" header-h1">Payment Management</h1>
        <!-- go to main page -->
        <a style="color:white;" class="header-i1 fa fa-home fa-4x" href="home.php"></a>
        <!-- logout -->
        <a style="color:white;" class="header-i2 fa fa-sign-out fa-4x" href="feedback1.php"></a>
    </div>
    <div id="body">
        <div class="section1">
            <h2>Here are your payment details</h2>
        </div>
        <div class="amount-details">
            <h3>Amount To be Paid:</h3><h4>Rs. 500</h4>
            <!-- display the amount details here after calculation -->
            <input type="button" value="Ticket Details" style="float: left; width: 140px;" onclick="location.href='page3.php';" /><br><br>
        </div>
        <div class="payment-mode">
       <?php
            if($amtt>=500)
            {
                echo "<h2>" ."Billing successfully done. Congratulations your train is booked.". "</h2>";

                $amtt=$amtt-500;
                $sql4= "UPDATE total SET  `amt`='$amtt' where `user_name`='".$user."';";
                $result2 = $db->query($sql4);

                
        
            }
            else{
                echo "<a href='wallet_mgmt.php'>"."<h2>"."Not enough funds in wallet. To add more click here"."</h2>";

            }
?>
            <!-- <h2>Kindly choose your payment option</h2> -->
            <!-- <ul class="payment-options">
                <li><img src="https://qphs.fs.quoracdn.net/main-qimg-2569681f342dd6c9319e2cab8920dbd2.webp" alt="" title="State Bank of India"></li>
                <li><img src="https://png.pngtree.com/png-clipart/20190904/original/pngtree-orange-wallet-icon-png-image_4462385.jpg" alt="" title="Your wallet"></li>
                <li><img src="https://akm-img-a-in.tosshub.com/indiatoday/images/story/202011/Screenshot_2020-11-05_at_5.14._1200x768.png?qbPeEkmH2KWK1YfUw65UmVr8EjYDRPgb&size=770:433" alt="" title="Google Pay" style="padding-top:5%;padding-bottom:5%"></li>
            </ul> -->
            <?php
            $_SESSION['amt']=$amtt;
            ?>

        </div>
    </div>
    <div id="footer">
        <!-- contact to admin -->
        <h2>Contact us</h2>
        <h3>Phone number:XXXXXXXXXX</h3>
        <h4>Email:XXX@XXX.com</h4>
    </div>
    <script src="payment_mgmt.js"></script>
</body>
</html>

