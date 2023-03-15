<?php
include('../../Config/config.php');

$tenbaiviet = $_POST['tenbaiviet'];
//xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$mota = $_POST['mota'];
$tinhtrang = $_POST['tinhtrang'];
$danhmucbaiviet = $_POST['danhmucbaiviet'];



if (isset($_POST['thembaiviet'])) {
	//them
	$sql_them = "INSERT INTO dsbaiviet(tenbaiviet,hinhanh,mota,tinhtrang,ID_danhmucbaiviet) VALUE 
	('".$tenbaiviet."','".$hinhanh."','".$mota."','".$tinhtrang."','".$danhmucbaiviet."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'Uploads/'.$hinhanh);
	header('Location:../../index.php?action=quanlybaiviet&query=them');
}

elseif(isset($_POST['suabaiviet'])){
	//sua
	if(!empty($_FILES['hinhanh']['name'])){

		move_uploaded_file($hinhanh_tmp,'Uploads/'.$hinhanh);
		$sql_sua = "UPDATE dsbaiviet SET tenbaiviet='".$tenbaiviet ."', hinhanh='".$hinhanh."', mota='".$mota."', tinhtrang='".$tinhtrang."', ID_danhmucbaiviet='".$danhmucbaiviet."' WHERE ID_Dsbaiviet='$_GET[idbaiviet]'";
		//xoa hinh anh cũ rồi update
		$sql = "SELECT * FROM dsbaiviet WHERE ID_Dsbaiviet = '$_GET[idbaiviet]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('Uploads/'.$row['hinhanh']);
		}
	}else{

		$sql_sua = "UPDATE dsbaiviet SET tenbaiviet='".$tenbaiviet ."', mota='".$mota."', tinhtrang='".$tinhtrang."',ID_danhmucbaiviet='".$danhmucbaiviet."' WHERE ID_Dsbaiviet='$_GET[idbaiviet]'";
	}
	mysqli_query($mysqli,$sql_sua);
	header('Location:../../index.php?action=quanlybaiviet&query=them');
}

else{
	//xoa
	$id = $_GET['idbaiviet'];
	$sql = "SELECT * FROM dsbaiviet WHERE ID_Dsbaiviet = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('Uploads/'.$row['hinhanh']);
	}
	$sql_xoa = "DELETE FROM dsbaiviet WHERE ID_Dsbaiviet = '".$id."' ";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlybaiviet&query=them');
}

?>