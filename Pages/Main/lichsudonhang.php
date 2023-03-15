<h4>Lịch Sử Đơn Hàng</h4>
<?php
	$ID_Khachhang = $_SESSION['ID_Khachhang'];
	$sql_lietke_donhang = "SELECT * FROM cart,dangki WHERE cart.ID_Khachhang=dangki.ID_Dangki AND cart.ID_Khachhang='$ID_Khachhang' ORDER BY cart.ID_Cart DESC";
	$query_lietke_donhang = mysqli_query($mysqli,$sql_lietke_donhang);
?>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
  	<th>ID</th>
    <th>Mã Đơn Hàng</th>
    <th>Tên Khách Hàng</th>
    <th>Địa Chỉ</th>
    <th>Email</th>
    <th>Số Điện Thoại</th>
    <th>Hình Thức Thanh Toán</th>
    <th>Tình Trạng</th>
    <th>Quản Lý Đơn Hàng</th>
  </tr>
 <?php
 	$i = 0;
 	while ($row = mysqli_fetch_array($query_lietke_donhang)) {	
 	$i++; 	
 ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['Code_Cart']?></td>
    <td><?php echo $row['tenkhachhang']?></td>
    <td><?php echo $row['diachi']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['sodienthoai']?></td>
    <td>
    	<?php 
    		if($row['cart_payment']=='vnpay' ||$row['cart_payment']=='paypal' ||$row['cart_payment']=='momo' ){
    	?>	
    		<a href=""><?php echo $row['cart_payment']?></a>
    	<?php 
    	}else{
    	?>
    		<?php echo $row['cart_payment']?>
    	<?php 
    	}
    	?>	
    	</td>
    <td>
    	<?php
    		if($row['Cart_Status']==1){
    			echo '<a href="model/quanlydonhang/xuly.php?cart_status=0&code='.$row['Code_Cart'].'">Đơn Hàng Mới</a>';
    		}else{
    			echo 'Đã Xem';
    		}	
    	?>
    	 
    </td>
  	<td>
  		<a href="index.php?quanly=xemdonhang&code=<?php echo $row['Code_Cart']?>">Xem Đơn Hàng</a> 
  	</td>

  </tr> 
 <?php
 }
 ?> 
</table>

