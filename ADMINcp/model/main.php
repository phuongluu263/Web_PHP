<div class = "clear"></div>
<div class="main">
	<?php
				if(isset($_GET['action']) && $_GET['query'])
				{
					$tam=$_GET['action'];
					$query=$_GET['query'];
				}
				else
				{
					$tam='';
					$query='';	
				}	
				//quan ly danh muc san pham
				if ($tam=='quanlydanhmucsanpham' && $query=='them')
				{
					include("model/quanlydanhmucsanpham/them.php");
					include("model/quanlydanhmucsanpham/lietke.php");
				}

				elseif($tam=='quanlydanhmucsanpham' && $query=='sua')
				{
					include("model/quanlydanhmucsanpham/sua.php");
				}
				//quan ly san pham
				elseif ($tam=='quanlysanpham' && $query=='them')
				{
					include("model/quanlysanpham/them.php");
					include("model/quanlysanpham/lietke.php");
				}	

				elseif($tam=='quanlysanpham' && $query=='sua')
				{
					include("model/quanlysanpham/sua.php");
				}
				elseif($tam=='quanlydonhang' && $query=='lietke')
				{
					include("model/quanlydonhang/lietke.php");
				}

				elseif($tam=='donhang' && $query=='xemdonhang')
				{
					include("model/quanlydonhang/xemdonhang.php");
				}
				//quan ly danh muc bai viet
				elseif ($tam=='quanlydanhmucbaiviet' && $query=='them')
				{
					include("model/quanlydanhmucbaiviet/them.php");
					include("model/quanlydanhmucbaiviet/lietke.php");
				}

				elseif($tam=='quanlydanhmucbaiviet' && $query=='sua')
				{
					include("model/quanlydanhmucbaiviet/sua.php");
				}
				//quan ly bai viet
				elseif ($tam=='quanlybaiviet' && $query=='them')
				{
					include("model/quanlybaiviet/them.php");
					include("model/quanlybaiviet/lietke.php");
				}

				elseif($tam=='quanlybaiviet' && $query=='sua')
				{
					include("model/quanlybaiviet/sua.php");
				}
				//
				elseif($tam=='quanlyweb' && $query=='capnhat')
				{
					include("model/thongtinweb/quanly.php");
				}
				//welcome
				else
				{
					include("model/welcome.php");
				}	
				?>
</div>