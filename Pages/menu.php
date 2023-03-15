<?php

	$sql_danhmuc="SELECT * FROM danhmucsp ORDER BY ID_Danhmuc DESC";
	$query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
	$sql_danhmucbaiviet="SELECT * FROM danhmucbaiviet ORDER BY ID_Baiviet DESC";
	$query_danhmucbaiviet=mysqli_query($mysqli,$sql_danhmucbaiviet);
?>

<?php

	if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
		unset($_SESSION['dangky']);
	}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%">
  <a class="navbar-brand" href="index.php" ><img style="width: 50px; height: 50px;" src="/ADMINcp/img/pk.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="color: #fff;">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Trang Chủ<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?quanly=giohang">Giỏ Hàng</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Danh mục sản phẩm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          	<?php 
          		while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
          		?>	
          		<a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['ID_Danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
          	<?php 
      		}
      		?>
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Danh mục bài viết
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          	<?php 
          		while($row=mysqli_fetch_array($query_danhmucbaiviet)){
          		?>	
          		<a class="dropdown-item" href = "index.php?quanly=danhmucbaiviet&id=<?php echo $row['ID_Baiviet']?>"><?php echo $row['tendanhmucbaiviet']?></a>
          	<?php 
      		}
      		?>
        </div>
      </li>
			<?php
				if(isset($_SESSION['dangky'])){
			?>
				<li class="nav-item"><a class="nav-link" href = "index.php?dangxuat=1">Đăng Xuất</a></li>
				<li class="nav-item"><a class="nav-link" href = "index.php?quanly=thaydoimatkhau">Thay Đổi Mật Khẩu</a></li>
				<li class="nav-item"><a class="nav-link" href = "index.php?quanly=lichsudonhang">Lịch Sử Đơn Hàng</a></li>
			<?php
			}else{
			?>
				<li class="nav-item"><a class="nav-link" href = "index.php?quanly=dangky">Đăng Ký</a></li>
			<?php
			}
			?>
		<li class="nav-item">
        	<a class="nav-link" href="index.php?quanly=tintuc">Tin Tức</a>
      	</li>	
      	<li class="nav-item">
        	<a class="nav-link" href="index.php?quanly=lienhe">Liên Hệ</a>
      	</li>	
    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php?quanly=timkiem" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Tìm Kiếm Sản Phẩm..." name="tukhoa" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" name="timkiem" type="submit">Search</button>
    </form>
  </div>
</nav>




		