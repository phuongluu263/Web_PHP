<p>Giỏ Hàng<br>
	<?php
		if(isset($_SESSION['dangky'])){
			echo 'Xin Chào:  '.'<span style ="color: red" >'.$_SESSION['dangky'].'</span>';
			//echo $_SESSION['ID_Khachhang'];
		}
	?>

</p>
<?php 
	if(isset($_SESSION['cart'])){
}
?>
<?php 
	if(isset($_SESSION['cart'])){
}
?>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step current"> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Lịch Sử Đơn Hàng</a><span> </div>
  </div>
</div>

<table style="width: 100%; text-align: center;border-collapse: collapse ;"border="1">
  <tr>
    <th>ID Sản Phẩm</th>
    <th>Tên Sản Phẩm</th>
    <th>Hình Ảnh Sản Phẩm</th>
    <th>Giá Sản Phẩm</th>
    <th>Số Lượng</th>    
    <th>Thành Tiền</th>  
    <th>Quản Lý</th> 
  </tr>

  <?php
  	if(isset($_SESSION['cart'])){
  		$i = 0;
  		$tongtien=0;
  		foreach($_SESSION['cart'] as $cart_item){
  			$thanhtien=$cart_item['soluong']*$cart_item['giaban'];
  			$tongtien+=$thanhtien;
  			$i++;
  ?>

	<tr>
	    <td><?php echo $i ?></td>
	    <td><?php echo $cart_item['tensanpham'] ?></td>
	    <td><img src="ADMINcp/model/quanlysanpham/Uploads/<?php echo $cart_item['anhsanpham']; ?>"width="150px"></td>
	    <td><?php echo number_format($cart_item['giaban'],0,',','.'). 'VND';?></td>
	    <td>
	    	<a href="Pages/Main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fas fa-plus fa-style"area-hidder="true"></i></a>
	    	<?php echo $cart_item['soluong'] ?>
	    	<a href="Pages/Main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fas fa-minus fa-style"area-hidder="true"></i></a>		
	    </td>
	    <td><?php echo number_format($thanhtien,0,',','.').'VND';?></td>
	    <td><a href="Pages/Main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xoá</a></td>
	</tr>
  		<?php
		}//foreach
		?>
			<tr>
		  		<td colspan="7">
		  			<p style="float: left;" >Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'VND';?></p>
		  			<p style="float: right;"><a href="Pages/Main/themgiohang.php?xoatatca=1">Xoá Tất Cả</a></p>
		  			<div style="clear: both"></div>
		  			<?php
		  			if(isset($_SESSION['dangky'])){
		  			?>	
		  				<p><a href="index.php?quanly=vanchuyen">Hình Thức Vận Chuyển</a></p>
		  			<?php	
		  			}else{
		  			?>
		  				<p><a href="index.php?quanly=dangky">Đăng Ký Đặt Hàng</a></p>
		  			<?php
		  			}
		  			?>
		  		</td>
		  	</tr>	
		<?php	
	  	}else{	
	  	?>
		  	<tr>
		  		<td colspan="7"><p>Hiện Tại Giỏ Hàng Đang Trống!!</p></td>

		  	</tr>	
	  	<?php
		}
	  	?>
</table>