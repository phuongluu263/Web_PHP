<p>Thêm Danh Sách Sản Phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
	<form method="POST" action="model/quanlysanpham/xuly.php" enctype="multipart/form-data">	
	  <tr>
	    <td>Tên Sản Phẩm</td>
	    <td><input type="text" size="100%" name="tensanpham"></td>
	  </tr>
	  <tr>
	    <td>Số Lượng</td>
	    <td><input type="text" size="100%" name="soluong"></td>
	  </tr>
	  <tr>
	    <td>Giá Bán</td>
	    <td><input type="text" size="100%" name="giaban"></td>
	  </tr>
	  <tr>
	    <td>Ảnh Sản Phẩm</td>
	    <td><input type="file" name="anhsanpham"></td>
	  </tr>
	  <tr>
	    <td>Mô Tả</td>
	    <td><textarea rows="10" name="mota" style="resize: none;"> </textarea></td>
	  </tr>
	  <tr>
	    <td>Danh Mục Sản Phẩm</td>
	    <td>
	    	<select name="danhmuc" >
	    		<?php
	    		$sql_danhmuc="SELECT * FROM danhmucsp ORDER BY ID_Danhmuc DESC";
	    		$query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
	    		while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    		?>
	    			<option value="<?php echo $row_danhmuc['ID_Danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
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
	    		<option value="0">Chưa Kích Hoạt</option>
	    	</select>
	    </td>
	  </tr>
	  <tr>
	  	<td ><input type="submit" name="themdanhsachsp" value="Thêm danh sách sản phẩm" ></td>
	  </tr>
	</form>  
</table>
