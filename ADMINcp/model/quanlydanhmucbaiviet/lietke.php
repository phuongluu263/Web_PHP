
<?php
	$sql_lietke_danhmucbaiviet = "SELECT * FROM danhmucbaiviet ORDER BY thutu DESC";
	$query_lietke_danhmucbaiviet = mysqli_query($mysqli,$sql_lietke_danhmucbaiviet);
?>
<p>Liệt Kê Danh Mục Bài Viết</p>

<table border="1" width="80%" style="border-collapse: collapse;">
  <tr>
  	<th>ID</th>
    <th>Tên Danh Mục Bài Viết</th>
    <!-- <th>Số Thứ Tự</th> -->
    <th>Quản Lý Danh Mục Bài Viết</th>
  </tr>
 <?php
 	$i = 0;
 	while ($row = mysqli_fetch_array($query_lietke_danhmucbaiviet)) {	
 	$i++; 	
 ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmucbaiviet']?></td>
  	<td>
  		<a class="button" href="model/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['ID_Baiviet']?>">Xoá</a>
		<a class="button" href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['ID_Baiviet']?>">Sửa</a>
  	</td>
  </tr> 
 <?php
 }
 ?> 
</table>
<style>
    table {
        border-collapse: collapse;
        width: 50%;
        margin: 20px auto;
    }
    th, td {
        padding: 10px;
        text-align: center;
        border: 1px solid black;
    }
    th {
        background-color: #ddd;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #fff;
    }
    .button {
        display: inline-block;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        background-color: #333333;
        color: white;
        border: none;
        border-radius: 6px;
        transition: background-color 0.3s;
    }
    .button:hover {
        background-color: #000;
		color: #fff;
    }
</style>
