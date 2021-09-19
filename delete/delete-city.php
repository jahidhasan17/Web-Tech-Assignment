<?php

	include('../config/constants.php');

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = " DELETE FROM tbl_city WHERE id='$id' ";
		$res = mysqli_query($conn,$sql);

		if($res == true){
			header('location:'.SITEURL.'manage-city.php');
		}

	}

?>