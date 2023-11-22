<?php
require_once("config.php");
session_start();
if(isset($_POST['donate'])){
	 $fname = $_POST['fullName'];
	 $dishName = $_POST['dishName'];
	 $totalPlate = $_POST['totalPlate'];
	 $donateBy = $_POST['donateBy'];
	 $collectAddress = $_POST['collectaddress'];
	 $uname = $_SESSION['uname'];
	 $q = "INSERT INTO `incoming`(`fullname`,`dishName`,`totalPlate`,`donateBy`,`collectAddress`,`username`) VALUES('$fname','$dishName','$totalPlate','$donateBy','$collectAddress','$uname')";
	 $senddata = mysqli_query($conn,$q);
	 if($senddata == true){
		 $_SESSION['donated'] = true;
	 }	 else{
		 $_SESSION['donated'] = false;
	 }
 }
 else{
	$_SESSION['donated'] = false;
 }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Donate</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic'
		rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php include("loginheader.html");?>
		<div class="container py-5 h-100" style="background-color: rgba(0, 0, 0, 0.5);margin-top: 5%;width: 500px;">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-12 col-xl-5">
					<div class="card shadow-2-strong" style="border-radius: 1rem;">
				<?php
				if($_SESSION['donated']==false)
				{
				?>
					<div class="card-body p-5 text-center">

							<h3 class="mb-5" style="color:white">Donate Now</h3>
							<form action="" style="margin: 20px; padding: auto;" method="POST">
								<div class="form-outline mb-4">
									<label class="form-label" for="Name"></label>
									<input required type="text" placeholder="Your Name" name="fullName" class="form-control form-control-lg"
										autocomplete="off" />
								</div>
								<div class="form-outline mb-4" style="margin-top: 10px;">
									<input required type="text" placeholder="Dish Name" name="dishName" class="form-control form-control-lg"
										autocomplete="off" />
								</div>

								<div class="form-outline mb-4" style="margin-top: 10px;">
									<input required type="number" class="form-control form-control-lg" name="totalPlate" placeholder="Total Plate" autocomplete="off" />
								</div>

								<div class="form-outline mb-4" style="margin-top: 10px;">
									<select class="form-control form-control-lg" style="width: 100%; padding: 5px;" name="donateBy">
										<option value="" disabled selected>Donate By</option>										
										<option value="Restaurants">Restaurants</option>
										<option value="People">People</option>
										<option value="Other">Other</option>
									</select>
								</div>
								<div class="form-outline mb-4" style="margin-top: 10px;">
									<input required type="text" class="form-control form-control-lg" name="collectaddress" placeholder="Where i Collect Food Address"
										autocomplete="off" />
								</div>

								<button class="btn btn-warning btn-lg btn-block" style="margin-top: 20px;"
									type="submit" name="donate">Donate</button>
							</form>
							<!-- <hr class="my-4"> -->
						</div>
					</div>
					<?php
				}
				else{
					?>
					<div class="card-body p-5 text-center">

					<h3 class="mb-5" style="color:white;">Thanks For Donating</h3>
				</div>
<?php
}?>
				</div>
			</div>
		</div>
</body>

</html>