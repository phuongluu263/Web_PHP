<?php
	$sql_lietke_donhang = "SELECT * FROM cart,dangki WHERE cart.ID_Khachhang=dangki.ID_Dangki ORDER BY cart.ID_Cart DESC";
	$query_lietke_donhang = mysqli_query($mysqli,$sql_lietke_donhang);
?>
<p>Liệt Kê Đơn Hàng</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
  	<th>ID</th>
    <th>Mã Đơn Hàng</th>
    <th>Tên Khách Hàng</th>
    <th>Địa Chỉ</th>
    <th>Email</th>
    <th>Số Điện Thoại</th>
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
    		if($row['Cart_Status']==1){
    			echo '<a href="model/quanlydonhang/xuly.php?cart_status=0&code='.$row['Code_Cart'].'">Đơn Hàng Mới</a>';
    		}else{
    			echo 'Đã Xem';
    		}	
    	?>
    	 
    </td>
  	<td>
  		<a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['Code_Cart']?>">Xem Đơn Hàng</a> 
  	</td>
  </tr> 
 <?php
 }
 ?> 
</table>
<style>
	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	th {
		background-color: #333333;
		color: white;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}
</style>

