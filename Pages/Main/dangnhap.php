<?php
 	if(isset($_POST['dangnhap'])){
 		$email = $_POST['email'];
 		$matkhau = md5($_POST['password']);
 		$sql = "SELECT * FROM dangki WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
 		$row = mysqli_query($mysqli,$sql);
 		$count = mysqli_num_rows($row);
 		if($count > 0){
 			$row_data = mysqli_fetch_array($row);
 			$_SESSION['dangky'] = $row_data['tenkhachhang'];
 			$_SESSION['email'] = $row_data['email'];
 			$_SESSION['ID_Khachhang'] = $row_data['ID_Dangki'];
 			header("Location:index.php?quanly=giohang");
 		}else{
 			echo '<p style ="color: red"> Email Hoặc Mật Khẩu Không Chính Xác, Vui Lòng Nhập Lại! </p>';
 			
 		}

 	}
?>
<p>Đăng Nhập</p>
	<form action="" autocomplete="off" method="POST">
		<table class="tbl_dangnhap" border="1" width="70%" class="table_login" style="text-align: center;border-collapse: collapse;">
			<tr>
				<td colspan="2">
					<h3 >ĐĂNG NHẬP KHÁCH HÀNG</h3>
	            </td>
			</tr>
			<tr>
				<td><h4>Tài Khoản</h4></td>
				<td><input type="text" name="email" style="width: 90%; font-size: 17px;"  placeholder="Email..."></td>						
			</tr>
			<tr>
				<td><h4>Mật Khẩu</h4></td>
				<td><input type="password" name="password" style="width: 90%; font-size: 17px;" placeholder="Password..."></td>					
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="dangnhap" value="Đăng Nhập"><strong>Sign in</strong></button></td>
			</tr>	
		</table>
	</form>
