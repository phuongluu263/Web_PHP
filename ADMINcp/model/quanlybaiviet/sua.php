<?php
	$sql_sua_baiviet = "SELECT * FROM dsbaiviet WHERE ID_Dsbaiviet='$_GET[idbaiviet]' LIMIT 1";
	$query_sua_baiviet = mysqli_query($mysqli,$sql_sua_baiviet);
?>
<p>Cập Nhật Danh Sách Bài Viết</p>
<table border="1" width="50%" style="border-collapse: collapse;">
<?php
	while($row = mysqli_fetch_array($query_sua_baiviet))
	{
?>	
	<form method="POST" action="model/quanlybaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>" enctype="multipart/form-data">	
	  <tr>
	    <td>Tên Bài Viết</td>
	    <td><input type="text" value="<?php echo $row['tenbaiviet']?>" name="tenbaiviet"> </td>
	  </tr>
	  <tr>
	    <td>Hình Ảnh</td>
	    <td>
	    	<input type="file" name="hinhanh">
			<img src="model/quanlybaiviet/Uploads/<?php echo $row['hinhanh']?>" width="120px">		    
	    </td>
	  </tr>
	  <tr>
	    <td>Mô Tả</td>
	    <td><textarea rows="10" name="mota" style="resize: none;"><?php echo $row ['mota']?> </textarea></td>
	  </tr>
	  <tr>
	    <td>Danh Mục Bài Viết</td>
	    <td>
	    	<select name="danhmucbaiviet" >
	    		<?php
	    		$sql_danhmucbaiviet="SELECT * FROM danhmucbaiviet ORDER BY ID_Baiviet DESC";
	    		$query_danhmucbaiviet=mysqli_query($mysqli,$sql_danhmucbaiviet);
	    		while($row_danhmucbaiviet = mysqli_fetch_array($query_danhmucbaiviet)){
	    			if($row_danhmucbaiviet['ID_Baiviet']==$row['ID_danhmucbaiviet']){
	    		?>
	    			<option selected value="<?php echo $row_danhmucbaiviet['ID_Baiviet']?>"><?php echo $row_danhmucbaiviet['tendanhmucbaiviet'] ?></option>
	    		<?php
	    		}else{
	    		?>
	    			<option value="<?php echo $row_danhmucbaiviet['ID_Baiviet']?>"><?php echo $row_danhmucbaiviet['tendanhmucbaiviet'] ?></option>
	    		<?php
	    			}
	    		}
	    		?>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	    <td>Tình Trạng</td>
	    <td>
	    	<select name="tinhtrang">
	    		<?php
	    		if ($row['tinhtrang']==1) {
	    		?>
		    		<option value="1" selected>Kích Hoạt</option>
		    		<option value="0">Ẩn</option>
	    		<?php
		    	}else{
		    	?>
	    			<option value="1">Kích Hoạt</option>
	    			<option value="0" selected>Ẩn</option>
	    		<?php
	    		}
	    		?>	
	    	</select>
	    </td>
	  </tr>
	  <tr>
	  	<td ><input type="submit" name="suabaiviet" value="Cập nhật bài viết" ></td>
	  </tr>
	</form>  
<?php
}
?>	
</table>
