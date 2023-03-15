<?php
 	session_start();
 	include('Config/config.php');
 	if(isset($_POST['dangnhap'])){
 		$taikhoan = $_POST['username'];
 		$matkhau = md5($_POST['password']);
 		$sql = "SELECT * FROM admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
 		$row = mysqli_query($mysqli,$sql);
 		$count = mysqli_num_rows($row);
 		if($count > 0){
 			$_SESSION['dangnhap'] = $taikhoan;
 			header("Location:index.php");
 		}else{
 			echo '<script>alert("Tài Khoản Và Mật Khẩu Không Chính Xác, Vui Lòng Nhập Lại!!")</script>';
 			header("Location:login.php");
 		}

 	}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
    background-color: #f2f2f2;
}

.logo {
    text-align: center;
    margin-top: 50px;
}

h1 {
    font-size: 50px;
    font-weight: bold;
    color: #333;
}

table.table_login {
    margin: 50px auto;
    background-color: #fff;
    width: 400px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

table.table_login h3 {
    margin: 0;
    padding: 10px;
    font-size: 20px;
    color: #333;
    background-color: #f2f2f2;
    border-radius: 10px 10px 0 0;
}

table.table_login td {
    padding: 10px;
    border: none;
}

table.table_login td h4 {
    margin: 0;
    padding: 0;
    font-size: 16px;
    color: #333;
}

table.table_login input[type="text"], table.table_login input[type="password"] {
    width: 90%;
    font-size: 16px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

table.table_login button[type="submit"] {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
    cursor: pointer;
}

</style>

    <head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login PK Market Form Template</title>
        
    </head> 
    <body>  
    	<div class="logo">
                <h1>PK STORE</h1>                          
            </div>
		<div class="Wrapper_login">
		    <form action="" autocomplete="off" method="POST">
				<table border="1" class="table_login" style="text-align: center;border-collapse: collapse;">
						<tr>
							<td colspan="2">
								<h3>ĐĂNG NHẬP ADMIN</h3>
	                        </td>
						</tr>
						<tr>
							<td><h4>Tài Khoản</h4></td>
							<td><input type="text" name="username" style="width: 90%; font-size: 17px;"  placeholder="Username..."></td>	
							
						</tr>
						<tr>
							<td><h4>Mật Khẩu</h4></td>
							<td><input type="password" name="password" style="width: 90%; font-size: 17px;" placeholder="Password..."></td>	
							
						</tr>
						<tr>
							<td colspan="2"><button style="width: 50%; margin: 10px;font-size: 15px;" type="submit" name="dangnhap" value="Đăng Nhập"><strong>Đăng Nhập</strong></button></td>
						</tr>	
				</table>
			</form>

		</div>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</body> 

</html>	