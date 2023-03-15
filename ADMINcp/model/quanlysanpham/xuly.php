<?php
include('../../Config/config.php');

$tensp = $_POST['tensanpham'];
$soluong = $_POST['soluong'];
$giaban = $_POST['giaban'];
//xu ly hinh anh
$anhsanpham = $_FILES['anhsanpham']['name'];
$anhsanpham_tmp = $_FILES['anhsanpham']['tmp_name'];
$anhsanpham = time().'_'.$anhsanpham;
$mota = $_POST['mota'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];



if (isset($_POST['themdanhsachsp'])) {
	//them
	$sql_them = "INSERT INTO danhsachsp(tensanpham,soluong,giaban,anhsanpham,mota,tinhtrang,ID_Danhmuc) VALUE 
	('".$tensp."','".$soluong."','".$giaban."','".$anhsanpham."','".$mota."','".$tinhtrang."','".$danhmuc."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($anhsanpham_tmp,'Uploads/'.$anhsanpham);
	header('Location:../../index.php?action=quanlysanpham&query=them');
}
elseif(isset($_POST['suadanhsachsp'])){
	//sua
	if(!empty($_FILES['anhsanpham']['name'])){

		move_uploaded_file($anhsanpham_tmp,'Uploads/'.$anhsanpham);
		$sql_sua = "UPDATE danhsachsp SET tensanpham='".$tensp ."', soluong='".$soluong."', giaban='".$giaban."', anhsanpham='".$anhsanpham."', mota='".$mota."', tinhtrang='".$tinhtrang."', ID_Danhmuc='".$danhmuc."' WHERE ID_Danhsach='$_GET[iddanhsach]'";
		//xoa hinh anh cũ rồi update
		$sql = "SELECT * FROM danhsachsp WHERE ID_Danhsach = '$_GET[iddanhsach]' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('Uploads/'.$row['anhsanpham']);
		}
	}else{

		$sql_sua = "UPDATE danhsachsp SET tensanpham='".$tensp ."', soluong='".$soluong."', giaban='".$giaban."', mota='".$mota."', tinhtrang='".$tinhtrang."',ID_Danhmuc='".$danhmuc."' WHERE ID_Danhsach='$_GET[iddanhsach]'";
	}
	mysqli_query($mysqli,$sql_sua);
	header('Location:../../index.php?action=quanlysanpham&query=them');
}
else{
	//xoa
	$id = $_GET['iddanhsach'];
	$sql = "SELECT * FROM danhsachsp WHERE ID_Danhsach = '$id' LIMIT 1";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('Uploads/'.$row['anhsanpham']);
	}
	$sql_xoa = "DELETE FROM danhsachsp WHERE ID_Danhsach = '".$id."' ";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlysanpham&query=them');
}

?>