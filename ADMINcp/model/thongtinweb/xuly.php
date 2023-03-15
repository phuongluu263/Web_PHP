<?php
include('../../Config/config.php');

$thongtinlienhe = $_POST['thongtinlienhe'];
$id=$_GET['id'];

if(isset($_POST['updateliennhe'])){
	//sua
	$sql_sua = "UPDATE lienhe SET thongtinlienhe='".$thongtinlienhe ."' WHERE ID_Lienhe='".$id."' ";
	mysqli_query($mysqli,$sql_sua);
	header('Location:../../index.php?action=quanlyweb&query=capnhat');
}


?>