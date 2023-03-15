
<?php
	$sql_product="SELECT * FROM danhsachsp WHERE danhsachsp.ID_Danhmuc='$_GET[id]' ORDER BY ID_Danhsach DESC";
	$query_product=mysqli_query($mysqli,$sql_product);
	//danhmuc
	$sql_cate="SELECT * FROM danhmucsp WHERE danhmucsp.ID_Danhmuc='$_GET[id]' LIMIT 1";
	$query_cate=mysqli_query($mysqli,$sql_cate);
	$row_tittle=mysqli_fetch_array($query_cate);
	
?>
			<h3>Danh Mục: <?php echo $row_tittle['tendanhmuc']?> </h3>
				<div class = "row">
					<?php
						while($row= mysqli_fetch_array($query_product)){
					?>
					<div class="col-md-3 col-sm-6">
						<a href="index.php?quanly=danhsachsp&id=<?php echo $row['ID_Danhsach']?>">
							<img class="img img-responsive" height="70px" width="100%" src="ADMINcp/model/quanlysanpham/Uploads/<?php echo $row['anhsanpham']?>">
							<p class="Title_Product">Tên Sản Phẩm: <?php echo $row['tensanpham']?></p>
							<p class="Price_Product">Giá: <?php echo number_format($row['giaban'],0,',','.').'VND'?></p>
						</a>
					</div>
					<?php
					}
					?>
				</div>
				

