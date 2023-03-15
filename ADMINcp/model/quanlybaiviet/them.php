<p>Thêm Danh Sách Bài Viết</p>
<table border="1" width="100%" style="border-collapse: collapse;">
	<form method="POST" action="model/quanlybaiviet/xuly.php" enctype="multipart/form-data">	
	  <tr>
	    <td>Tên Bài Viết</td>
	    <td><input type="text" size="100%" name="tenbaiviet"></td>
	  </tr>
	  <tr>
	    <td>Hình Ảnh</td>
	    <td><input type="file" name="hinhanh"></td>
	  </tr>
	  <tr>
	    <td>Mô Tả</td>
	    <td><textarea rows="10" name="mota" style="resize: none;"> </textarea></td>
	  </tr>
	  <tr>
	    <td>Danh Mục Bài Viết</td>
	    <td>
	    	<select name="danhmucbaiviet" >
	    		<?php
	    		$sql_danhmucbaiviet="SELECT * FROM danhmucbaiviet ORDER BY ID_Baiviet DESC";
	    		$query_danhmucbaiviet=mysqli_query($mysqli,$sql_danhmucbaiviet);
	    		while($row_danhmucbaiviet = mysqli_fetch_array($query_danhmucbaiviet)){
	    		?>
	    			<option value="<?php echo $row_danhmucbaiviet['ID_Baiviet']?>"><?php echo $row_danhmucbaiviet['tendanhmucbaiviet'] ?></option>
	    		<?php
	    		}
	    		?>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	    <td>Tình Trạng</td>
	    <td>
	    	<select name="tinhtrang">
	    		<option value="1">Kích Hoạt</option>
	    		<option value="0">Ẩn</option>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	  	<td ><input type="submit" name="thembaiviet" value="Thêm bài viết" ></td>
	  </tr>
	</form>  
</table>
