<?php
include('../../Config/config.php');

$tendanhmucbaiviet = $_POST['tendanhmucbaiviet'];
$sothutu = $_POST['thutu'];

if (isset($_POST['themdanhmucbaiviet'])) {
	//them
	$sql_them = "INSERT INTO danhmucbaiviet(tendanhmucbaiviet,thutu) VALUE ('".$tendanhmucbaiviet."','".$sothutu."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}
elseif(isset($_POST['suadanhmucbaiviet'])){
	//sua
	$sql_sua = "UPDATE danhmucbaiviet SET tendanhmucbaiviet='".$tendanhmucbaiviet ."', thutu='".$sothutu."' WHERE ID_Baiviet='$_GET[idbaiviet]'";
	mysqli_query($mysqli,$sql_sua);
	header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}
else{
	//xoa
	$id = $_GET['idbaiviet'];
	$sql_xoa = "DELETE FROM danhmucbaiviet WHERE ID_Baiviet = '".$id."' ";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}

?>