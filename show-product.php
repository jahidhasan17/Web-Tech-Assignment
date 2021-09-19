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

	
    <?php

        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }

    ?>



    <div class = "container_show_user">
        <?php
        $sql2 = "select * from tbl_product where id=$id";
		$res2 = mysqli_query($conn,$sql2);

        if($res2 == true){
            $p_name = mysqli_fetch_assoc($res2)['product_name'];
            ?>
            <h3>Order Information of Product : <?php echo $p_name; ?></h3>
            <?php
        }

        ?>

        <br>
        <table class="table table-secondary table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th width="10%" class = "text-center">#</th>
                <th width="20%" class = "text-center">User Name</th>
                <th width="20%" class = "text-center">User City</th>
                <th width="20%" class = "text-center">User Contact</th>
                <th width="10%" class = "text-center">Quantity</th>
                <th width="20%" class = "text-center">Total</th>
            </tr>
            </thead>
            <tbody>

            <?php

		  		$sql = "select * from tbl_order where product_id=$id";
				$res = mysqli_query($conn,$sql);

                if($res == true){
                    $row_cnt = mysqli_num_rows($res);

                    if($row_cnt > 0){
                        $sl = 1;
                        while($row = mysqli_fetch_assoc($res)){
                            $u_id = $row['user_id'];
                            
                            $sql1 = "select * from tbl_user where id=$u_id";
				            $res1 = mysqli_query($conn,$sql1);
                            if($res1 == true){

                                while($row1 = mysqli_fetch_assoc($res1)){
                                    $u_name = $row1['full_name'];
                                    $user_city_id = $row1['city_id'];
                                    $sql4 = "select * from tbl_city where id=$user_city_id";
				                    $res4 = mysqli_query($conn,$sql4);
                                    if($res4 == true){
                                        while($row2 = mysqli_fetch_assoc($res4)){
                                            $c_name = $row2['city_name'];
                                        }
                                    }
                                    $user_contact = $row1['user_contact'];
                                }
                                
                            }
                            ?>

                                <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $u_name; ?></td>
                                <td><?php echo $c_name; ?></td>
                                <td><?php echo $user_contact; ?></td>
                                <td><?php echo $row['qty'] ?></td>
                                <td><?php echo $row['total'] ?></td>
                            </tr>

                            <?php
                        }

                    }
                }

		  	?>

            </tbody>
        </table>	
    </div>

	
</body>
</html>
