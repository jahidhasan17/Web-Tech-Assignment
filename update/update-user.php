<?php

include('../config/constants.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>This is my web Site</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>        

            <div class="container">
            <a href="<?php echo SITEURL; ?>" class="btn btn-primary btn-lg hm">Home</a>
            <br><br>
                <h1 class="heading_text">Update User</h1>
                <br><br>
			
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-6">

							<?php
								$id = $_GET['id'];
								$sql = "SELECT * FROM tbl_user WHERE id = $id";
								$res = mysqli_query($conn,$sql);

								if($res == true){
									$cnt = mysqli_num_rows($res);
									if($cnt == 1){
										$row = mysqli_fetch_assoc($res);
										$full_name = $row['full_name'];
										$email = $row['email'];
										$city_id = $row['city_id'];
										$address = $row['address'];
										$user_contact = $row['user_contact'];
									}
								}
							?>

							<form action="" method="POST" class="form-container" enctype="multipart/form-data">

							  <div class="form-group">
							    <label >Full Name</label>
							    <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
							  </div>
                              <br>

							  <div class="form-group">
							  	<label >City:</label>
							  	<select name="city">

										<?php

											$sql1 = " SELECT * FROM tbl_city ";
											$res1 = mysqli_query($conn,$sql1);
											$cnt1 = mysqli_num_rows($res1);

											if($cnt1 > 0){
												while($row1 = mysqli_fetch_assoc($res1)){
													$city_id = $row1['id'];
													$city_name = $row1['city_name'];
													?>
													<option value="<?php echo $city_id;?>"><?php echo $city_name;?></option>
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
							    <label >Email</label>
							    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
							  </div>
                              <br>

							  <div class="form-group">
							    <label >Address</label>
							    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
							  </div>
                              <br>

                              <div class="form-group">
							    <label >Contact</label>
							    <input type="text" class="form-control" name="contact" value="<?php echo $user_contact; ?>">
							  </div>
							  <br>

                              <br>
                              <input type="hidden" name="id" value="<?php echo $id; ?>">
							  <input type="submit" name="submit" value="Update" class="btn-primary btn-lg btn-block" style="width: 100%">

							</form>
						</div>
					</div>

	

	<!-- -----------------------------------------------------  -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>


<?php

	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
        $city_id = $_POST['city'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];

		echo $id, " ",  $contact;


		$sql2 = " UPDATE tbl_user SET
			full_name = '$full_name',
			email = '$email',
			city_id = '$city_id',
			address = '$address',
			user_contact = '$contact'
			WHERE id = '$id'
		 ";

		 $res2 = mysqli_query($conn,$sql2);

		 if($res2 == true){
		 	header('location:'.SITEURL.'manage-user.php');
		 }else{
			 echo "sldfjlskdfj sldkfj sldkfj lskdfj sldf";
		 }
	}

?>