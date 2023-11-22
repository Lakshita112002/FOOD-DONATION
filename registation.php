<?php
session_start();
require('config.php');
if(isset($_POST['submit'])){
 $name =  $_POST['name'];
 $email =  $_POST['email'];
 $password =  $_POST['password'];
 $confirm_password =  $_POST['confirm_password'];
 
 $q = "SELECT * FROM `Users` WHERE email = '$email'";
 $run = mysqli_query($conn,$q);
  if(mysqli_num_rows($run)==0){ 	
    if($password == $confirm_password){
      $password = password_hash($password, PASSWORD_DEFAULT);
      $q = "INSERT INTO `users`(`Uname`, `email`, `password`) VALUES ('$name','$email','$password')"; 
      mysqli_query($conn,$q);
      header('location:login.php');
    }
    else{
      $_SESSION['error'] = "Password invaild";
    }
  }
  else{
    $_SESSION['error'] = "Email already registered";
  }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
  </head>
<body>
<?php 
include("header.html");
?>

    <div class="login-box" style="height: 570px;">
            <?php if(isset($_SESSION["error"])){
                     $error = $_SESSION["error"];
            ?> 
                <div class='error'>
                     <?php echo "<span>$error</span>";?>
                </div><?php } ?>            
                    <form method="post" action="">
                       
                       <p>Name</p> 
                       <input type="text" name="name" placeholder="Enter name">
	          				   <p id="nameErr" style="color:red;font-size:13px"></p>
					   
                       <p>Email</p>
                       <input type="text" name="email" id="mytext" placeholder="Enter Email" autocomplete="off">
                       <p id="txtHint" name="txtHint" style="color:red;font-size:13px"></p>
                       <p id="emailErr" style="color:red;font-size:13px"></p>                  
                       <p>Password</p>
                       <input type="password" name="password" placeholder="Enter Password" autocomplete="off">
					             <p id="passErr" style="color:red;font-size:13px"></p>

                       <p>Confirm Password</p>
                       <input type="password" name="confirm_password" placeholder="Enter Confirm Password" autocomplete="off">
					             <p id="cpassErr" style="color:red;font-size:13px"></p>
                      
                      <input type="submit" name="submit" value="Submit">
                       
                       <a href="login.php">Already have Account</a>
    
                    </form> 
        </div>
  </div>
</body>
</html>
