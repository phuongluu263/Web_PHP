<?php
	if(isset($_GET['trang'])){
		$page = $_GET['trang'];
	}
	else{
		$page = 1;
	}
	if($page == '' || $page == '1'){
		$begin = 0;
	}
	else{
		$begin = ($page*8)-8;
	}
	$sql_product="SELECT * FROM danhmucsp,danhsachsp WHERE danhsachsp.ID_Danhmuc=danhmucsp.ID_Danhmuc  ORDER BY danhsachsp.ID_Danhsach DESC LIMIT $begin,8";
	$query_product=mysqli_query($mysqli,$sql_product);
?>

<h3>Sản Phẩm Mới Nhất</h3>
				<div class = "row">
					<?php
						while($row= mysqli_fetch_array($query_product)){
					?>
					<div class="col-md-3 col-sm-6">
						<a href="index.php?quanly=danhsachsp&id=<?php echo $row['ID_Danhsach']?>">
							<img class="img img-responsive" width="100%" src="ADMINcp/model/quanlysanpham/Uploads/<?php echo $row['anhsanpham']?>">
							<p class="Title_Product">Tên Sản Phẩm: <?php echo $row['tensanpham']?></p>
							<p class="Price_Product">Giá: <?php echo number_format($row['giaban'],0,',','.').'VND'?></p>
							<p style="text-align: center;color: #000;"><?php echo $row['tendanhmuc']?></p>
						</a>
					</div>
					<?php
					}
					?>
				</div>

				<div style="clear: both;"></div>
				<style type="text/css">
					ul.List_trang{
						padding: 0;
						margin: 0;
						list-style: none;
					}
					ul.List_trang li{
						float: left;
						padding: 5px 13px;
						margin: 5px;
						background: burlywood;
					}
					ul.List_trang li a{
						color: #000;
						text-align: center;
						text-decoration: none;
						display: block;
					}
				</style>
				<?php
						$sql_trang = mysqli_query($mysqli," SELECT * FROM danhsachsp");
						$row_count = mysqli_num_rows($sql_trang);
						$trang = ceil($row_count/8);
					?>
				<p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?> </p>
					
				<ul class="List_trang">
					<?php
						for ($i = 1; $i <= $trang ; $i++) { 
					?>	
						<li <?php 
								if($i == $page){ 
									echo 'style = "background: darkgray"';
								} 
								else{
									echo '';
								}
							?>>
							<a href="index.php?trang=<?php echo $i ?>">
								<?php echo $i ?>								
							</a>
						</li>
					<?php
					}
					?>
				</ul>