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
			
			<h1 class="heading_text">Add Order</h1>
				<br><br>
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-6">

							<form action="" method="POST" class="form-container">

                                <div class="form-group">
							  	<label >User : </label>
							  	<select name="user">

										<?php

											$sql = " SELECT * FROM tbl_user ";
											$res = mysqli_query($conn,$sql);
											$cnt = mysqli_num_rows($res);

											if($cnt > 0){
												while($row = mysqli_fetch_assoc($res)){
													$id = $row['id'];
													$full_name = $row['full_name'];
													?>
													<option value="<?php echo $id;?>"><?php echo $full_name;?></option>
													<?php
												}
											}else{
												?>
												<option value = "0">No User Found</option>
												<?php
											}

										?>
									</select>
							    </div>
                                <br>


                                <div class="form-group">
							  	<label >Product : </label>
							  	<select name="product">

										<?php

											$sql = " SELECT * FROM tbl_product ";
											$res = mysqli_query($conn,$sql);
											$cnt = mysqli_num_rows($res);

											if($cnt > 0){
												while($row = mysqli_fetch_assoc($res)){
													$id = $row['id'];
													$p_name = $row['product_name'];
                                                    $p_p = $row['price']
													?>
													<option value="<?php echo $id;?>"><?php echo $p_name , " - $" , $p_p;?></option>
													<?php
												}
											}else{
												?>
												<option value = "0">No Product Found</option>
												<?php
											}

										?>
									</select>
							    </div>
                                <br>


							  <div class="form-group">
							    <label >Quantity</label>
							    <input type="number" class="form-control" name="qty" placeholder="Enter Quantity...">
							  </div>
                
							  <br>
							  <input type="submit" name="submit" value="Add Order" class="btn-primary btn-lg btn-block" style="width: 100%">

							</form>
						</div>
					</div>

		</div>
	
</body>
</html>


<?php

	if(isset($_POST['submit'])){
		$user_id = $_POST['user'];
		$p_id = $_POST['product'];
        $qty = $_POST['qty'];
        $total = $qty * $p_p;


		$sql = " INSERT INTO tbl_order SET

			user_id = '$user_id',
			product_id = '$p_id',
            qty = '$qty',
            total = '$total'
		 ";

		 $res = mysqli_query($conn,$sql) or die(mysqli_error());

		 if($res == true){
			header("location:".SITEURL.'index.php');
		 }
	}

?>