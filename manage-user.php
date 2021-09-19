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

		<h1 class="heading_text">Manage User</h1>
		<br><br>

		
		
		<table class="table table-secondary table-striped table-bordered table-hover">
		  <thead>
		    <tr>
		      <th width="5%" class = "text-center">#</th>
		      <th width="10%" class = "text-center">Full Name</th>
              <th width="10%" class = "text-center">Email</th>
              <th width="10%" class = "text-center">City</th>
              <th width="10%" class = "text-center">Address</th>
              <th width="10%" class = "text-center">Contact</th>
		      <th width="30%" class = "text-center">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php

		  		$sql = "select * from tbl_user";
					$res = mysqli_query($conn,$sql);

					if($res == true){
						$row_cnt = mysqli_num_rows($res);

						if($row_cnt > 0){
							$sl = 1;
							while($row = mysqli_fetch_assoc($res)){
								$c_id = $row['city_id'];
								?>

									<tr>
							    	<td class = "text-center"><?php echo $sl++; ?></td>
                                    <td class = "text-center"><?php echo $row['full_name']; ?></td>
                                    <td class = "text-center"><?php echo $row['email']; ?></td>
									<?php
										$sql1 = "SELECT * FROM tbl_city WHERE id = $c_id";
										$res1 = mysqli_query($conn,$sql1);
										$row1 = mysqli_fetch_assoc($res1);
										$city_name = $row1['city_name'];
									?>
                                    <td class = "text-center"><?php echo $city_name; ?></td>
                                    <td class = "text-center"><?php echo $row['address']; ?></td>
                                    <td class = "text-center"><?php echo $row['user_contact']; ?></td>
							    	<td class = "text-center">
							    		<a href="<?php echo SITEURL; ?>update/update-user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary admin_btn">Update User</a>
							    		<a href="<?php echo SITEURL; ?>delete/delete-user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger admin_btn">Delete User</a>
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