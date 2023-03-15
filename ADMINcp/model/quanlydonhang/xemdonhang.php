<p>Xem Đơn Hàng</p>
<?php
	$code=$_GET['code'];
	$sql_lietke_donhang = "SELECT * FROM cart_luudon,danhsachsp WHERE cart_luudon.ID_Sanpham=danhsachsp.ID_Danhsach AND Cart_luudon.Code_Cart='".$code."' ORDER BY cart_luudon.ID_Cart_Luudon DESC";
	$query_lietke_donhang = mysqli_query($mysqli,$sql_lietke_donhang);
?>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
  	<th>ID</th>
    <th>Mã Đơn Hàng</th>
    <th>Tên Sản Phẩm</th>
    <th>Số Lượng</th>
    <th>Đơn Giá</th>
    <th>Thành Tiền</th>
  </tr>
 <?php
 	$i = 0;
 	$tongtien = 0;
 	while ($row = mysqli_fetch_array($query_lietke_donhang)) {	
 	$i++; 	
 	$thanhtien = $row['giaban']*$row['Soluongdon'];
 	$tongtien += $thanhtien;
 ?>
	<tr>
	  	<td><?php echo $i ?></td>
	    <td><?php echo $row['Code_Cart']?></td>
	    <td><?php echo $row['tensanpham']?></td>
	    <td><?php echo $row['Soluongdon']?></td>
	    <td><?php echo number_format($row['giaban'],0,',','.'). 'VND'?></td>
	    <td><?php echo number_format(($row['giaban']*$row['Soluongdon']),0,',','.'). 'VND'?></td>	
	</tr> 
 <?php
 }
 ?> 
	<tr>
	 	<td colspan="6">
	  		<p>Tổng Tiền: <?php echo number_format(($tongtien),0,',','.'). 'VND'?></p>	
	  	</td>
	</tr>
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

