<?php
	$sql_lietke_baiviet = "SELECT * FROM dsbaiviet,danhmucbaiviet WHERE dsbaiviet.ID_danhmucbaiviet = danhmucbaiviet.ID_Baiviet ORDER BY ID_Baiviet DESC";
	$query_lietke_baiviet = mysqli_query($mysqli,$sql_lietke_baiviet );
?>
<p>Liệt Kê Danh Sách Bài Viết</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
  	<th>ID</th>
    <th>Tên Bài Viết</th>    
    <th>Danh Mục</th>
    <th>Hình Ảnh</th>
    <th>Mô Tả</th>
    <th>Tình Trạng</th>
    <th>Quản Lý Danh Mục Bài Viết</th>
  </tr>
 <?php
 	$i = 0;
 	while ($row = mysqli_fetch_array($query_lietke_baiviet)) {	
 	$i++; 	
 ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet']?></td>
    <td><?php echo $row['tendanhmucbaiviet']?></td>
    <td><img src="model/quanlybaiviet/Uploads/<?php echo $row['hinhanh'] ?>" width="120px"></td>
    <td><?php echo $row['mota']?></td>
    <td><?php if($row['tinhtrang']==1){
        echo"Kích Hoạt";
    }
    else{
        echo"Ẩn";
    }
    ?>   
    </td>
  	<td>
  		<a href="model/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['ID_Dsbaiviet']?>">Xoá</a> |<a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['ID_Dsbaiviet']?>">Sửa</a>
  	</td>
  </tr> 
 <?php
 }
 ?> 
</table>
