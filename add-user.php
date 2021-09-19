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

	
	<div class="">

		<div class="container">
		<a href="<?php echo SITEURL; ?>" class="btn btn-primary btn-lg hm">Home</a>
			<br><br>
			
			<h1 class="heading_text">Add User</h1>
				<br><br>
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-6">

							<form action="" method="POST" class="form-container">

							  <div class="form-group">
							    <label >Full Name</label>
							    <input type="text" class="form-control" name="full_name" placeholder="Enter A Name..">
							  </div>
                              <br>

							  <div class="form-group">
							    <label >Email</label>
							    <input type="text" class="form-control" name="email" placeholder="Enter Email..">
							  </div>
                              <br>


                              <div class="form-group">
							  	<label >City:</label>
							  	<select name="city">

										<?php

											$sql = " SELECT * FROM tbl_city ";
											$res = mysqli_query($conn,$sql);
											$cnt = mysqli_num_rows($res);

											if($cnt > 0){
												while($row = mysqli_fetch_assoc($res)){
													$id = $row['id'];
													$city_name = $row['city_name'];
													?>
													<option value="<?php echo $id;?>"><?php echo $city_name;?></option>
													<?php
												}
											}else{
												?>
												<option value = "0">No City Found</option>
												<?php
											}

										?>
									</select>
							  </div>
                              <br>


							  <div class="form-group">
							    <label >Address</label>
							    <input type="text" class="form-control" name="address" placeholder="Enter a Address..">
							  </div>
                              <br>

                              <div class="form-group">
							    <label >Contact</label>
							    <input type="text" class="form-control" name="contact" placeholder="Enter a Contact..">
							  </div>
							  <br>
							  <input type="submit" name="submit" value="Add User" class="btn-primary btn-lg btn-block" style="width: 100%">

							</form>
						</div>
					</div>

		</div>
	
</body>
</html>


<?php

	if(isset($_POST['submit'])){
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
        $city_id = $_POST['city'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];


		$sql = " INSERT INTO tbl_user SET

			full_name = '$full_name',
			email = '$email',
            city_id = '$city_id',
            address = '$address',
            user_contact = '$contact'
		 ";

		 $res = mysqli_query($conn,$sql) or die(mysqli_error());

		 if($res == true){
			header("location:".SITEURL.'index.php');
		 }
	}

?>