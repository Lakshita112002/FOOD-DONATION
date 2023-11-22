<?php
session_start();
// username = admin
// password = admin@123
require('config.php');
if(isset($_POST['login'])){
   $email = $_POST['email'];
   $password = $_POST['password'];	
	$q = "SELECT * FROM `Users` WHERE email = '$email'";
   $run = mysqli_query($conn,$q);
   if(mysqli_num_rows($run)>0){
      $result = mysqli_fetch_array($run);
      if(password_verify($password,$result['password'])==true){
         if($email =="admin"){
            $_SESSION['uname'] =$email;
            $_SESSION["adminlogin"] = true;
            header('location:admin/index.php');
         }
         else{
         $_SESSION['uname'] = $result['Uname'];
         $_SESSION["loggedIn"]=true;
         header('location:index.php');
         }
      }
      else{
         $_SESSION['error'] = "Password Invalid";
         header('location:login.php');
      }
   }
   else{
      $_SESSION['error'] = "Email not Register yet";
   }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	   <link rel="stylesheet" type="text/css" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">

</head>
<body>
<?php include("header.html");?>	
<div class="login-box">
             <img src="img/avatar.png" class="avatar">
                 
                 <h1>Login Here</h1>
            <?php if(isset($_SESSION["error"])){
                     $error = $_SESSION["error"];
            ?> 
                <div class='error'>
                     <?php echo "<span>$error</span>";?>
                </div><?php } ?>
                    <form action="" method="POST">
                       
                       <p>User Email</p>
                       <input type="text" name="email" placeholder="Enter Email" autocomplete="off" required>
                       <p>Password</p>
                       <input type="password" name="password" placeholder="Enter Password" autocomplete="off" required> 
                       <input type="submit" name="login" value="Login">
                       <a href="#">Forget Password</a></br></br>
                       <a href="registation.php">Create Account</a>
                    </form>
        </div>
	</div>
</body>
</html>