<?php
require_once("config.php");
session_start();
if(isset($_POST['requested'])){
	 $fname = $_POST['requestPersonName'];
	 $totalPlate = $_POST['totalPlateWant'];
	 $Address = $_POST['address'];
	 date_default_timezone_set('Asia/Kolkata');
	 $time = date('H:i');
	 $uname = $_SESSION['uname'];
	 $q = "INSERT INTO `outgoing`(`requestPersonName`,`totalPlateWant`,`address`,`requestedTime`,`username`) VALUES('$fname','$totalPlate','$Address','$time','$uname')";
	 $senddata = mysqli_query($conn,$q);
	 if($senddata == true){
		 $_SESSION['Requested'] = true;
	 }
	 else{
		 $_SESSION['Requested'] = false;
	 }
 }
 else{
	$_SESSION['Requested'] = false;
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Volunteer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php include("loginheader.html");?>
		<div class="container py-5 h-100" style="background-color: white;margin-top: 5%;width: 500px;">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-12 col-xl-5">
					<div class="card shadow-2-strong" style="border-radius: 1rem;">
				<?php
				if($_SESSION['Requested']==false)
				{
				?>
					<div class="card-body p-5 text-center">

							<h3 class="mb-5">Tell me where you see hungry people</h3>
							<form action="" style="margin: 20px; padding: auto;" method="POST">
								<div class="form-outline mb-4">
									<label class="form-label" for="Name"></label>
									<input required type="text" placeholder="Your Name" name="requestPersonName" class="form-control form-control-lg"
										autocomplete="off" required/>
								</div>
								<div class="form-outline mb-4" style="margin-top: 10px;">
									<input required type="number" class="form-control form-control-lg" name="totalPlateWant" placeholder="Total Plate You Want" autocomplete="off" />
								</div>
								<div class="form-outline mb-4" style="margin-top: 10px;">
									<input required type="text" class="form-control form-control-lg" name="address" placeholder="Where i give food (Address)"
										autocomplete="off" />
								</div>

								<button class="btn btn-success btn-lg btn-block" style="margin-top: 20px;"
									type="submit" name="requested">Request Food</button>
							</form>
							<hr class="my-4">
						</div>
					</div>
					<?php
				}
				else{
					?>
					<div class="card-body p-5 text-center">

					<h3 class="mb-5">Thanks For Become Volunteer</h3>
				</div>
<?php
}?>
				</div>
			</div>
		</div>
</body>
</html>