<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
		}
		$sql_product = "SELECT * FROM danhsachsp,danhmucsp WHERE danhsachsp.ID_Danhmuc=danhmucsp.ID_Danhmuc AND danhsachsp.tensanpham LIKE '%".$tukhoa."%'";
		$query_product = mysqli_query($mysqli,$sql_product);
?>
<h3> Từ Khoá Tìm Kiếm: <?php echo $_POST['tukhoa'] ?></h3>
<ul class="List_Product">
	<?php
		while($row = mysqli_fetch_array($query_product)){
			?>
			<li>
			<a href="index.php?quanly=danhsachsp&id=<?php echo $row['ID_Danhsach'] ?>">
			<img src="admincp/model/quanlysanpham/Uploads/<?php echo $row['anhsanpham'] ?>">
			<p class="Title_Product">Tên Sản Phẩm : <?php echo $row['tensanpham'] ?></p>
			<p class="Price_Product">Giá : <?php echo number_format($row['giaban'],0,',','.').'VND' ?></p>
			<p style="text-align: center;color:#000"><?php echo $row['tendanhmuc'] ?></p>
		</a>
		</li>
	<?php
	}
	?>
</ul>
			
						