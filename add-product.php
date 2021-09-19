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

	
	<div class="add-admin-bg">

		<div class="container">
			<a href="<?php echo SITEURL; ?>" class="btn btn-primary btn-lg hm">Home</a>
			<br><br>
			
			<h1 class="heading_text">Add Product</h1>
				<br><br>
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-lg-6">

							<form action="" method="POST" class="form-container">

							  <div class="form-group">
							    <label >Product Name</label>
							    <input type="text" class="form-control" name="p_name" placeholder="Enter Product Name">
							  </div>

                              <br>

                              <div class="form-group">
							    <label >Price</label>
							    <input type="number" class="form-control" name="p_p" placeholder="Enter Product Price">
							  </div>

							  <br>
							  <input type="submit" name="submit" value="Add Product" class="btn-primary btn-lg btn-block" style="width: 100%">

							</form>
						</div>
					</div>

		</div>

</body>
</html>


<?php

	if(isset($_POST['submit'])){
		$p_name = $_POST['p_name'];
        $p_p = $_POST['p_p'];


		$sql = " INSERT INTO tbl_product SET
			product_name = '$p_name',
            price = '$p_p'
		 ";

		 $res = mysqli_query($conn,$sql) or die(mysqli_error());

		 if($res == true){
			header("location:".SITEURL.'index.php');
		 }
	}

?>