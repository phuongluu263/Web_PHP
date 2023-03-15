<?php
	include('../../Config/config.php');
	if(isset($_GET['cart_status']) && isset($_GET['code'])){
		$status = $_GET['cart_status'];
		$code = $_GET['code'];
		$sql=mysqli_query($mysqli,"UPDATE cart SET Cart_Status='".$status."' WHERE Code_Cart='".$code."' ");
		header('Location:../../index.php?action=quanlydonhang&query=lietke');
	}
?>
