<?php
require_once("config.php");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Donate</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic'
		rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<?php include("loginheader.html");?>
		<div class="container-fuild mx-2 h-50" style="margin-top:100px;width:98%">
    <div class="row">
    <div class="col">
      <div class="h2 text-center text-light bg-success">Doner </div>    
<table class="table table-dark">
  <thead class="thead-light">
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Dish Name</th>
      <th scope="col">Total Plate</th>
      <th scope="col">Donate By</th>
      <th scope="col">Collect Address</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $Uname = $_SESSION['uname'];
      $q = "SELECT * FROM `incoming` WHERE username = '$Uname'";
      $query = mysqli_query($conn, $q);
      while($result = mysqli_fetch_array($query)){
  ?>        
    <tr>
      <th scope="row"><?php echo $result['fullName'];?></th>
      <td><?php echo $result['dishName'] ?></td>
      <td><?php echo $result['totalPlate'] ?></td>
      <td><?php echo $result['donateBy'] ?></td>
      <td><?php echo $result['collectAddress'] ?></td>
    </tr>
    <?php 
}
?>
  </tbody>
</table>
</div>

<div class="col">        
<div class="h2 text-center text-dark bg-warning">Volunteer </div>    
<table class="table table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Request Person Name</th>
      <th scope="col">Plate Want</th>
      <th scope="col">Address</th>
      <th scope="col">Requested Time</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $Uname = $_SESSION['uname'];
      $q = "SELECT * FROM `outgoing` WHERE username = '$Uname'";
      $query = mysqli_query($conn, $q);
      while($result = mysqli_fetch_array($query)){
  ?>        
    <tr>
      <th scope="row"><?php echo $result['requestPersonName'];?></th>
      <td><?php echo $result['totalPlateWant'] ?></td>
      <td><?php echo $result['address'] ?></td>
      <td><?php echo $result['requestedTime'] ?></td>
    </tr>
    <?php 
}
?>
  </tbody>
</table>
</div>
</div>

                </div>
</body>

</html>