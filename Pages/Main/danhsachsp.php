<p>Chi Tiết Sản Phẩm</p>
	<?php
		$sql_chitiet="SELECT * FROM danhmucsp,danhsachsp WHERE danhsachsp.ID_Danhmuc=danhmucsp.ID_Danhmuc AND danhsachsp.ID_Danhsach='$_GET[id]' LIMIT 1";
		$query_chitiet=mysqli_query($mysqli,$sql_chitiet);
		while($row_chitiet = mysqli_fetch_array($query_chitiet)){
	?>
		<div class="Wrapper_chitiet">
			<div class="Hinhanh_Sanpham">
				<img width="80%" src="ADMINcp/model/quanlysanpham/Uploads/<?php echo $row_chitiet['anhsanpham']?>">	
			</div>

			<form method="POST" action="Pages/Main/themgiohang.php/?idsanpham=<?php echo $row_chitiet['ID_Danhsach']?>">	
				<div class="Chitiet_Sanpham">
					<h4 style="margin: 0">Tên Sản Phẩm: <?php echo $row_chitiet['tensanpham']?></h4>
					<p>Giá Sản Phẩm: <?php echo number_format($row_chitiet['giaban'],0,',','.').'VND'?></p>
					<p>Danh Mục Sản Phẩm: <?php echo $row_chitiet['tendanhmuc']?></p>
					<p>Mô Tả Sản Phẩm: <?php echo $row_chitiet['mota']?></p>
					<p>Tình Trạng Sản Phẩm: 
						<?php if($row_chitiet['tinhtrang']==1){
			     		   	echo"Kích Hoạt";
			    			}else{
			        		echo"Chưa Kích Hoạt";
			    			}
			    			?>  
			    	</p>
					<p><input class="Themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng" ></p>
				</div>
			</form>
			
		</div>
	<?php
	}
	?>
