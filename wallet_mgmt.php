<!-- Wallet management
src(account bank and credit card)
Bank name
add new source
account number wallet id
balance
wallet pswd -->
<?php
// Start the session

?>

<?php
$db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'traindb' ) or die(mysqli_error($db));
        session_start();
        if(!isset($_SESSION['sess_user']) && !isset($_SESSION['amt'])){  
           header("location:home.php");
            exit();
        
           }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="wallet_mgmt.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Wallet Management</title>
</head>
<body>

    <!-- header -->
    <div id="header">
        <!-- Wallet Management -->
        <h1 class=" header-h1">Wallet Management</h1>
        <button class="btn btn-default" style="float: right; width: 100px;" ><a href="home.php">Back</a></button>
        <!-- go to main page -->
        <!-- <i class="header-i1 fa fa-home fa-4x"></i> -->
        <!-- logout -->
        <!-- <i class="header-i2 fa fa-sign-out fa-4x"></i> -->
    </div>
    <div id="body">
        <!-- display sources (account bank and credit card) -->
        <div class="sources">
            <!-- <h2>Here is the list of sources you have</h2> -->
            <?php
                $a=$_SESSION['amt'];
                $user=$_SESSION['sess_user'];
    
                $type_query = "SELECT * FROM wallet WHERE username='$user';";
                $result = $db->query($type_query);
            ?>
                <?php 
                $amtt=0;
                
                while($rows=$result->fetch_assoc())
                {
                    $amtt=$amtt+$rows['wallet_amt'];
             ?>
                <!-- <tr>
                <td><?php echo $rows['wallet_amt'];?></td>  
                </tr> -->
                <?php
                }
            ?>
                <h2>The total funds from diffferent sources before booking</h2>
                <?php
                echo "$amtt";
               
                $sql3="SELECT * FROM total WHERE `user_name`='".$user."'";
                $query=mysqli_query($db,$sql3);  
                $numrows=mysqli_num_rows($query); 
                if($numrows==0) 
                {
                $sql2= "INSERT INTO total (`user_name`, `amt`) VALUES ('$user', '$amtt');";
                $result1 = $db->query($sql2);
                }
                else
                 {
                
                $sql4= "UPDATE total SET  `amt`='$a' where `user_name`='".$user."';";
                $result2 = $db->query($sql4);
                }
                ?>
            
        </div>
        <!-- option for add new source -->
        
        <div class="new-source">
            <h2>You can add your new source here, click the button below </h2>
            <button class="new-source-button btn btn-primary btn-lg" type="submit" value="Add new source">Add new source</button>
            <div class="new-src-content"style="display:none;">
                <form action="" method="POST">
                    <h4>Enter your new source</h4>
                    <input type="text" name="src"> 
                    <h4>Enter the amount you want to transfer</h4>
                    <input type="number" min="0" max="50000" name="amt">   <br>         
                    <input class="reset-button btn btn-primary btn-lg" type="submit" value="submit" name="submit" style="margin-top:10px;">
                </form>
                <?php
                    if(isset($_POST['submit']))
                    {
                    $src=$_POST['src'];
                    $amt=$_POST['amt'];
                    $sql1= "INSERT INTO wallet (`Type`, username, wallet_amt) VALUES ('$src', '$user', '$amt');";
                    
                    $result = $db->query($sql1);
                    if($result)
                    {
                        echo "sucessfully updated!!";
                    }
                }
                    ?>
            </div>       
        </div>
        
        <!-- display account number and corresponding wallet id -->
        <!-- <div class="wallet-display">
            <h2>Here is the list of sources with amount </h2>
        </div>
        
        <?php
        $type_query = "SELECT * FROM wallet WHERE username='$user';";
        $result = $db->query($type_query);
        while($row=mysqli_fetch_assoc($result)){
            ?>

            <td><b><?php echo $row['Type'];?></b></td>
            <td><?php echo $row['wallet_amt'];?></td>
            

        <?php
        
        }
        ?> -->
        <!-- display balance -->
        <div class="balance-display">
            <!-- <h2>The total funds from diffferent sources after booking</h2> -->
            <?php
            $total="SELECT * from total where `user_name`='$user';";
            $result2 = $db->query($total);
            $row1=$result2->fetch_assoc();
            echo $row1['amt'];
            mysqli_close($db);
            ?>
            
           
          
             
        </div>
        <!-- access to change the pswd -->
        <!-- <div class="change-pswd">
            <h2>Want to change wallet password, click here</h2>
            <button class="change-pswd-button btn btn-primary btn-lg" type="submit" value="Change password">Change wallet password</button>
        </div> -->
        <!-- onclick to change wallet pswd -->
        
    </div>
    <!-- footer -->
    <div id="footer">
        <!-- contact to admin -->
        <h2>Contact us</h2>
        <h3>Phone number:XXXXXXXXXX</h3>
        <h4>Email:XXX@XXX.com</h4>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script >
        $(".new-source-button").click(function(){
            $(".new-src-content").show();
        });
    </script>
</body>
</html>