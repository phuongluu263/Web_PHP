<?php
	$sql_lietke_danhsachsp = "SELECT * FROM danhsachsp,danhmucsp WHERE danhsachsp.ID_Danhmuc = danhmucsp.ID_Danhmuc ORDER BY ID_Danhsach DESC";
	$query_lietke_danhsachsp = mysqli_query($mysqli,$sql_lietke_danhsachsp );
?>
<p>Liệt Kê Danh Sách Sản Phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
  	<th>ID</th>
    <th>Tên Sản Phẩm</th>
    <th>Số Lượng</th>
    <th>Danh Mục</th>
    <th>Giá Bán</th>
    <th>Ảnh Sản Phẩm</th>
    <th>Mô Tả</th>
    <th>Tình Trạng</th>
    <th>Quản Lý Danh Mục</th>
  </tr>
 <?php
 	$i = 0;
 	while ($row = mysqli_fetch_array($query_lietke_danhsachsp)) {	
 	$i++; 	
 ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham']?></td>
    <td><?php echo $row['soluong']?></td>
    <td><?php echo $row['tendanhmuc']?></td>
    <td><?php echo number_format($row['giaban'],0,',','.').'VND'?></td>
    <td><img src="model/quanlysanpham/Uploads/<?php echo $row['anhsanpham'] ?>" width="120px"></td>
    <td><?php echo $row['mota']?></td>
    <td><?php if($row['tinhtrang']==1){
        echo"Kích Hoạt";
    }
    else{
        echo"Chưa Kích Hoạt";
    }
    ?>   
    </td>
  	<td>
  		<a href="model/quanlysanpham/xuly.php?iddanhsach=<?php echo $row['ID_Danhsach']?>">Xoá</a> |<a href="?action=quanlysanpham&query=sua&iddanhsach=<?php echo $row['ID_Danhsach']?>">Sửa</a>
  	</td>
  </tr> 
 <?php
 }
 ?> 
</table>
