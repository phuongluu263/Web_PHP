		<h4>Danh Mục Sản Phẩm</h4>
				<ul class="List_Sidebar">
					<?php
						$sql_danhmuc="SELECT * FROM danhmucsp ORDER BY ID_Danhmuc DESC";
						$query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);	
						while($row=mysqli_fetch_array($query_danhmuc)){			
					?>


					<li style="text-transform: uppercase;"><a href = "index.php?quanly=danhmucsanpham&id=<?php echo $row['ID_Danhmuc']?>"><?php echo $row['tendanhmuc']?></a></li>
					

					<?php
					}
					?>														
				</ul>

		<h4>Danh Mục Bài Viết</h4>
				<ul class="List_Sidebar">
					<?php
						$sql_danhmucbaiviet="SELECT * FROM danhmucbaiviet ORDER BY ID_Baiviet DESC";
						$query_danhmucbaiviet=mysqli_query($mysqli,$sql_danhmucbaiviet);	
						while($row=mysqli_fetch_array($query_danhmucbaiviet)){			
					?>


					<li style="text-transform: uppercase;"><a href = "index.php?quanly=danhmucbaiviet&id=<?php echo $row['ID_Baiviet']?>"><?php echo $row['tendanhmucbaiviet']?></a></li>
					

					<?php
					}
					?>														
				</ul>		
