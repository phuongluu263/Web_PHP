<?php
	$sql_sua_danhsachsp = "SELECT * FROM danhsachsp WHERE ID_Danhsach='$_GET[iddanhsach]' LIMIT 1";
	$query_sua_danhsachsp = mysqli_query($mysqli,$sql_sua_danhsachsp);
?>
<p>Sửa Danh Sách Sản Phẩm</p>
<table border="1" width="50%" style="border-collapse: collapse;">
<?php
	while($row = mysqli_fetch_array($query_sua_danhsachsp))
	{
?>	
	<form method="POST" action="model/quanlysanpham/xuly.php?iddanhsach=<?php echo $_GET['iddanhsach'] ?>" enctype="multipart/form-data">	
	  <tr>
	    <td>Tên Sản Phẩm</td>
	    <td><input type="text" value="<?php echo $row['tensanpham']?>" name="tensanpham"> </td>
	  </tr>
	  <tr>
	    <td>Số Lượng</td>
	    <td><input type="text" value="<?php echo $row['soluong']?>" name="soluong"> </td>
	  </tr>
	  <tr>
	    <td>Giá Bán</td>
	    <td><input type="text" value="<?php echo $row['giaban']?>" name="giaban"></td>
	  </tr>
	  <tr>
	    <td>Ảnh Sản Phẩm</td>
	    <td>
	    	<input type="file" name="anhsanpham">
			<img src="model/quanlysanpham/Uploads/<?php echo $row['anhsanpham']?>" width="120px">		    
	    </td>
	  </tr>
	  <tr>
	    <td>Mô Tả</td>
	    <td><textarea rows="10" name="mota" style="resize: none;"><?php echo $row ['mota']?> </textarea></td>
	  </tr>
	  <tr>
	    <td>Danh Mục Sản Phẩm</td>
	    <td>
	    	<select name="danhmuc" >
	    		<?php
	    		$sql_danhmuc="SELECT * FROM danhmucsp ORDER BY ID_Danhmuc DESC";
	    		$query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
	    		while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
	    			if($row_danhmuc['ID_Danhmuc']==$row['ID_Danhmuc']){
	    		?>
	    			<option selected value="<?php echo $row_danhmuc['ID_Danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
	    		<?php
	    		}else{
	    		?>
	    			<option value="<?php echo $row_danhmuc['ID_Danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
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
		    		<option value="0">Chưa Kích Hoạt</option>
	    		<?php
		    	}else{
		    	?>
	    			<option value="1">Kích Hoạt</option>
	    			<option value="0" selected>Chưa Kích Hoạt</option>
	    		<?php
	    		}
	    		?>	
	    	</select>
	    </td>
	  </tr>
	  <tr>
	  	<td ><input type="submit" name="suadanhsachsp" value="Sửa danh sách sản phẩm" ></td>
	  </tr>
	</form>  
<?php
}
?>	
</table>
