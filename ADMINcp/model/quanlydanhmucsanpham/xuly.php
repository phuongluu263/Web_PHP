<?php
include('../../Config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$sothutu = $_POST['thutu'];
if (isset($_POST['themdanhmuc'])) {
	//them
	$sql_them = "INSERT INTO danhmucsp(tendanhmuc,thutu) VALUE ('".$tenloaisp."','".$sothutu."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
elseif(isset($_POST['suadanhmuc'])){
	//sua
	$sql_sua = "UPDATE danhmucsp SET tendanhmuc='".$tenloaisp ."', thutu='".$sothutu."' WHERE ID_Danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_sua);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
else{
	//xoa
	$id = $_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM danhmucsp WHERE ID_Danhmuc = '".$id."' ";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

?>