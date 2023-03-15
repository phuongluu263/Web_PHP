<?php
	if(isset($_POST['dangky'])){
		$tenkh = $_POST['hoten'];
		$email = $_POST['email'];
		$diachi = $_POST['diachi'];
		$sodienthoai = $_POST['sodienthoai'];
		$matkhau = md5($_POST['matkhau']);
		$sql_dangky = mysqli_query($mysqli, "INSERT INTO dangki(tenkhachhang, email, diachi, sodienthoai, matkhau) VALUE ('".$tenkh."','".$email."','".$diachi."','".$sodienthoai."','".$matkhau."') ");
		if($sql_dangky){
			echo '<p style ="color: gray"> Bạn Đã Đăng Ký Thành Công </p>';
			$_SESSION['dangky'] = $tenkh;
			$_SESSION['email'] = $email;
			$_SESSION['ID_Khachhang'] = mysqli_insert_id($mysqli);
			header('Location:index.php?quanly=giohang');
		}
	}
?>
<p>Đăng Kí Thành Viên</p>
		<style type="text/css">
			table.tbl_dangky tr td{
				padding: 5px;
			}

		</style>
<form action="" method="POST">
	<table class="tbl_dangky" border="1" width="50%" style="border-collapse: collapse;">
		<tr>
			<td>Họ và tên:</td>
			<td><input type="text" size="40" name="hoten"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" size="40" name="email"></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><input type="text" size="40" name="diachi"></td>
		</tr>
		<tr>
			<td>Số điện thoại:</td>
			<td><input type="text" size="40" name="sodienthoai"></td>
		</tr>
		<tr>
			<td>Mật khẩu:</td>
			<td><input type="text" size="40" name="matkhau"></td>
		</tr>
		<tr>
			<td><input name="dangky" type="submit" value="Đăng Ký"></td>
			<td ><a href="index.php?quanly=dangnhap">Đã có tài khoản - Đăng Nhập</a></td>
		</tr>
	</table>
</form>	