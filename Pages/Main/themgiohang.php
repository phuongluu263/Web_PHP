<?php
	session_start();
	include('../../ADMINcp/Config/config.php');
	//them so luong
	if(isset($_GET['cong'])){
		$id=$_GET['cong'];
		foreach ($_SESSION['cart'] as $cart_item){
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);
				$_SESSION['cart']=$product;
			}else{
				
				if($cart_item['soluong']<10){
					$tangsoluong=$cart_item['soluong']+1;
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);	
				}
				else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);
				}
				$_SESSION['cart']=$product;
			}
		}
		header('Location:../../index.php?quanly=giohang');
	}

	//tru so luong
	if(isset($_GET['tru'])){
		$id=$_GET['tru'];
		foreach ($_SESSION['cart'] as $cart_item){
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);
				$_SESSION['cart']=$product;
			}else{
				
				if($cart_item['soluong']>1){
					$tangsoluong=$cart_item['soluong']-1;
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);	
				}
				else{
					$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);
				}
				$_SESSION['cart']=$product;
			}
		}
		header('Location:../../index.php?quanly=giohang');
	}

	//xoa san pham
	if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		foreach ($_SESSION['cart'] as $cart_item){
			
			if($cart_item['id']!=$id){
				$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);
			}
			$_SESSION['cart']=$product;
			header('Location:../../index.php?quanly=giohang');
		}
	}
	//xoa tat ca
	if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
		unset($_SESSION['cart']);
		header('Location:../../index.php?quanly=giohang');
	}


	//****************//
	//session_destroy();

	if(isset($_POST['themgiohang'])){
		$id=$_GET['idsanpham'];
		$soluong=1;
		$sql ="SELECT * FROM danhsachsp WHERE ID_Danhsach='".$id."' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($query);
		if($row){
			$new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giaban'=>$row['giaban'],'anhsanpham'=>$row['anhsanpham']));

			//kiem tra gio hang ton tai
			if (isset($_SESSION['cart'])) {
				$found = false;
				foreach ($_SESSION['cart'] as $cart_item) {
					//neu du lieu trung
					if($cart_item['id']==$id){
						$product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anhsanpham'=>$cart_item['anhsanpham']);
					}
				}
				//lien ket new_product với product
				if($found== false){
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}

			}else{
				$_SESSION['cart'] = $new_product;
			}
		}
			header('Location:../../../index.php?quanly=giohang');	
	
	}
?>	