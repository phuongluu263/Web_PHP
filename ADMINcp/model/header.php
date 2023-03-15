<?php
	if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
		$_SESSION['dangnhap'];
		header("Location:login.php");
	}
?>
