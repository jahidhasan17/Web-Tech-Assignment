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


	<div class="container" style="width: 90%">
        <a href="<?php echo SITEURL; ?>" class="btn btn-primary btn-lg hm">Home</a>
        <br><br>

		<h1 class="heading_text">Manage City</h1>
		<br><br>

		
		
		<table class="table table-secondary table-striped table-bordered table-hover">
		  <thead>
		    <tr>
		      <th width="10%" class = "text-center">#</th>
		      <th width="30%" class = "text-center">City Name</th>
		      <th width="60%" class = "text-center">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

		  		$sql = "select * from tbl_city";
					$res = mysqli_query($conn,$sql);

					if($res == true){
						$row_cnt = mysqli_num_rows($res);

						if($row_cnt > 0){
							$sl = 1;
							while($row = mysqli_fetch_assoc($res)){
								?>

									<tr>
							    	<td class = "text-center"><?php echo $sl++; ?></td>
                                    <td class = "text-center"><?php echo $row['city_name']; ?></td>
							    	<td class = "text-center">
							    		<a href="<?php echo SITEURL; ?>update/update-city.php?id=<?php echo $row['id']; ?>" class="btn btn-primary admin_btn">Update Category</a>
							    		<a href="<?php echo SITEURL; ?>delete/delete-city.php?id=<?php echo $row['id']; ?>" class="btn btn-danger admin_btn">Delete Category</a>
							    	</td>
							    </tr>

								<?php
							}

						}else{
							
						}
					}else{

					}

		  	?>

		  </tbody>
		</table>		



	</div>

    </body>
</html>