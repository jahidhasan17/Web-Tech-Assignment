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
        <a href="add-city.php" class="btn btn-primary btn-lg ">Add City</a>
        <a href="manage-city.php" class="btn btn-primary btn-lg">Manage City</a>

        <a href="add-user.php" class="btn btn-primary btn-lg ms-5">Add User</a>
        <a href="manage-user.php" class="btn btn-primary btn-lg ">Manage User</a>

        <a href="add-product.php" class="btn btn-primary btn-lg ms-5">Add Product</a>
        <a href="manage-product.php" class="btn btn-primary btn-lg ">Manage Product</a>

        <br><br>
        <a href="add-order.php" class="btn btn-primary btn-lg">Add Order</a>
        <a href="manage-order.php" class="btn btn-primary btn-lg ">Manage Order</a>


        <div class = "filter">
            <br><br><br><br>
            <h4 class = "btn btn-primary btn-lg fl">Filter <h4>
            <br>
            <form action="" method="POST" class="ff">
                <div class="form-group">
                    <label >See Order Details of User : </label>
                    
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

                <input type="submit" name="submit" value="Apply" class="apl">
            </form>

            <br><br><br>
            <!-- <h4 class = "btn btn-primary btn-lg fl_user">See Order Details of Product :  <h4> -->
            

            <form action="" method="POST" class="ff">
                <div class="form-group">
                    <label >See Order Details of Product : </label>
                    
                    <select name="product">

                        <?php

                            $sql = " SELECT * FROM tbl_product";
                            $res = mysqli_query($conn,$sql);
                            $cnt = mysqli_num_rows($res);

                            if($cnt > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $p_name = $row['product_name'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $p_name;?></option>
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

                <input type="submit" name="submit2" value="Apply" class="apl">
            </form>
            <br><br><br>

        </div>


    </div>

	

</body>
</html>

<?php

	if(isset($_POST['submit'])){
		$user_id = $_POST['user'];

        header("location:".SITEURL."show-user.php?id=$user_id");
	}

    if(isset($_POST['submit2'])){
		$p_id = $_POST['product'];

        header("location:".SITEURL."show-product.php?id=$p_id");
	}

?>