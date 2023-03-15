<?php	
  	if(isset($_POST['doimatkhau'])){
 		$emailtaikhoan = $_POST['email'];
 		$matkhau_cu = md5($_POST['password_cu']);
 		$matkhau_moi = md5($_POST['password_moi']);
 		$sql = "SELECT * FROM dangki WHERE email='".$emailtaikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
 		$row = mysqli_query($mysqli,$sql);
 		$count = mysqli_num_rows($row);
 		if($count > 0){
 			$sql_update = mysqli_query($mysqli,"UPDATE dangki SET matkhau = '".$matkhau_moi."' ");
 			echo '<p style = "color: blue">Tài Khoản Và Mật Khẩu Đã Đổi Thành Công.</p>';
 		}else{
 			echo '<p style = "color: red">Tài Khoản Hoặc Mật Khẩu Cũ Không Chính Xác, Vui Lòng Nhập Lại!!</p>';
 		}

 	}
?>
<p>Đổi Mật Khẩu Thành Viên</p>
 <form action="" autocomplete="off" method="POST">
				<table border="1" class="table_login" width="60%" style="text-align: center;border-collapse: collapse;">
						<tr>
							<td colspan="2">
								<h3 >ĐỔI MẬT KHẨU ADMIN_PK</h3>
	                        </td>
						</tr>
						<tr>
							<td><h4>Tài Khoản</h4></td>
							<td><input type="email" name="email" style="width: 90%; font-size: 17px;"  placeholder="Username..."></td>	
							
						</tr>
						<tr>
							<td><h4>Mật Khẩu Cũ</h4></td>
							<td><input type="text" name="password_cu" style="width: 90%; font-size: 17px;" placeholder="Password_Cũ..."></td>	
							
						</tr>
						<tr>
							<td><h4>Mật Khẩu Mới</h4></td>
							<td><input type="text" name="password_moi" style="width: 90%; font-size: 17px;" placeholder="Password_Mới..."></td>	
							
						</tr>
						<tr>
							<td colspan="2"><button type="submit" name="doimatkhau" value="Đổi Mật Khẩu"><strong>Sign in</strong></button></td>
						</tr>	
				</table>
</form>