<?php

include('config/constants.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>This is my web Site</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>


		<div class="container">
			<a href="<?php echo SITEURL; ?>" class="btn btn-primary btn-lg hm">Home</a>
			<br><br>
			
			<h1 class="heading_text">Add City</h1>
			<br><br>
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-lg-6">

						<form action="" method="POST" class="form-container">

							<div class="form-group">
							<label >City Name</label>
							<input type="text" class="form-control" name="city_name" placeholder="Enter a City Name">
							</div>

							<br>
							<input type="submit" name="submit" value="Add City" class="btn-primary btn-lg btn-block" style="width: 100%">

						</form>
					</div>
				</div>
			</div>
		</div>

</body>
</html>


<?php

	if(isset($_POST['submit'])){
		$city_name = $_POST['city_name'];


		$sql = " INSERT INTO tbl_city SET
			city_name = '$city_name'
		 ";

		 $res = mysqli_query($conn,$sql) or die(mysqli_error());

		 if($res == true){
			header("location:".SITEURL.'index.php');
		 }
	}

?>