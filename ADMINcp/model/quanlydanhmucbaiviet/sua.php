
<?php
	$sql_sua_danhmucbaiviet = "SELECT * FROM danhmucbaiviet WHERE ID_Baiviet='$_GET[idbaiviet]' LIMIT 1";
	$query_sua_danhmucbaiviet = mysqli_query($mysqli,$sql_sua_danhmucbaiviet);
?>
<p>Sửa Danh Mục Bài Viết</p>
<table border="1" width="20%" style="border-collapse: collapse;">
	<form method="POST" action="model/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>">	
	<?php
		while($dong = mysqli_fetch_array($query_sua_danhmucbaiviet)){

	?>	
	  <tr>
	    <td>Tên Danh Mục Bài Viết</td>
	    <td><input type="text" value="<?php echo $dong['tendanhmucbaiviet']?>" name="tendanhmucbaiviet"></td>
	  </tr>
	  <tr>
	    <td>Số thứ tự</td>
	    <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
	  </tr>
	  <tr>
	  	<td colspan="2"><input type="submit" name="suadanhmucbaiviet" value="Cập nhật danh mục sản phẩm" ></td>
	  </tr>
	  <?php
	  	}
	  ?>
	</form>  
</table>
<style>
table {
  border-collapse: collapse;
  margin: 20px auto;
  width: 50%;
  background-color: #fff;
  color: #333;
}

th, td {
  padding: 10px;
  border: 1px solid #ccc;
}

th {
  background-color: #333;
  color: #fff;
  text-align: left;
}

form {
  margin: 20px auto;
  width: 30%;
}

label, input {
  display: block;
  margin-bottom: 10px;
  width: 100%;
}

input[type="submit"] {
  background-color: #333333;
  border: none;
  color: #fff;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 10px;
  cursor: pointer;
}
</style>