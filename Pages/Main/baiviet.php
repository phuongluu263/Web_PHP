<?php
	$sql_bv="SELECT * FROM dsbaiviet WHERE dsbaiviet.ID_Dsbaiviet='$_GET[id]'LIMIT 1";
	$query_bv=mysqli_query($mysqli,$sql_bv);
	$query_bv_all=mysqli_query($mysqli,$sql_bv);
	$row_bv_tittle=mysqli_fetch_array($query_bv);
	/*<img src="ADMINcp/model/quanlybaiviet/Uploads/<?php echo $row_bv['hinhanh']?>">*/
?>
<h3>Bài Viết: <span style="text-align: center; text-transform: uppercase;"><?php echo $row_bv_tittle['tenbaiviet']?> </span></h3>
				<ul class = "baiviet">
						<?php				
							while($row_bv= mysqli_fetch_array($query_bv_all)){
						?>	
							<li>
								
								
								<p class="Title_BV">Nội Dung Bài Viết <?php echo $row_bv['mota']?></p>
							</li>
							
						<?php
						}
						?>
				</ul>