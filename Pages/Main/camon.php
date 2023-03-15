<?php
	include('ADMINcp/Config/config.php');
	
	if(isset($_GET['vnp_Amount'])){
		
		$vnp_Amount=  $_GET['vnp_Amount'];
		$vnp_BankCode= $_GET['vnp_BankCode'];
		$vnp_BankTranNo= $_GET['vnp_BankTranNo'];
		$vnp_CardType= $_GET['vnp_CardType'];
		$vnp_OrderInfo= $_GET['vnp_OrderInfo'];
		$vnp_PayDate= $_GET['vnp_PayDate'];
		$vnp_TmnCode= $_GET['vnp_TmnCode'];
		$vnp_TransactionNo= $_GET['vnp_TransactionNo'];
		$code_cart = $_SESSION['code_cart'];

		//Insert database vnpay
		$insert_vnpay = "INSERT INTO vnpay(vnp_amount,vnp_bankcode,vnp_banktranno,vnp_cardtype,vnp_orderinfo,vnp_paydate,vnp_tmncode,vnp_transactionno,code_cart) VALUE ('".$vnp_Amount."','".$vnp_BankCode."','".$vnp_BankTranNo."','".$vnp_CardType."','".$vnp_OrderInfo."','".$vnp_PayDate."','".$vnp_TmnCode."','".$vnp_TransactionNo."','".$code_cart."')";
		$cart_query = mysqli_query($mysqli,$insert_vnpay);
		if($cart_query){
		//insert giỏ hàng
			echo '<h4>Giao Dịch Thanh Toán Bằng VNPAY Thành Công!!</h4>';
			echo '<p>Vui lòng vào trang <a target="_black" href="#">lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn.</p>';
		}else{
			echo '<h4>Giao Dịch VNPAY Thất Bại!!</h4>';
		}
	}elseif(isset($_GET['partnerCode'])){
		$partnerCode=  $_GET['partnerCode'];
		$orderId= $_GET['orderId'];
		$amount= $_GET['amount'];
		$orderInfo= $_GET['orderInfo'];
		$orderType= $_GET['orderType'];
		$transId= $_GET['transId'];
		$payType= $_GET['payType'];
		$code_order = rand(0,9999);
		$ID_Khachhang = $_SESSION['ID_Khachhang'];
		$cart_payment = 'momo';
		//$id_dangky = $_SESSION['ID_Khachhang'];

		$sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM vanchuyen WHERE id_dangky = '$ID_Khachhang' LIMIT 1");  
	    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
	    $id_vanchuyen = $row_get_vanchuyen['id_vanchuyen'];

		//Insert database momo
		$insert_momo = "INSERT INTO momo(partner_code,order_id,amount,order_info,order_type,trans_id,pay_type,Code_Cart) VALUE ('".$partnerCode."','".$orderId."','".$amount."','".$orderInfo."','".$orderType."','".$transId."','".$payType."','".$code_order."')";
		$cart_query = mysqli_query($mysqli,$insert_momo);

		//-------------Insert vào đơn hàng---------------------------------//
		$insert_cart = "INSERT INTO cart(ID_Khachhang,Code_Cart,Cart_Status,cart_payment,cart_vanchuyen) VALUE('".$ID_Khachhang."','".$code_order."',1,'".$cart_payment."','".$id_vanchuyen."')";
		$cart_query = mysqli_query($mysqli,$insert_cart);
		if($cart_query){
			//--------------------------------------------------------------------//
			//if($cart_query){
				//them gio hang chi tiet
			foreach ($_SESSION['cart'] as $key => $value) {
				$ID_Sanpham = $value['id'];
				$soluong = $value['soluong'];
				$insert_order_details ="INSERT INTO cart_luudon(ID_Sanpham,Code_Cart,Soluongdon) VALUE('".$ID_Sanpham."','".$code_order."','".$soluong."')";
				mysqli_query($mysqli,$insert_order_details);
			}
		//insert giỏ hàng
			echo '<h4>Giao Dịch Thanh Toán Bằng MOMO Thành Công!!</h4>';
			echo '<p>Vui lòng vào trang <a target="_black" href="#">lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn.</p>';
		}else{
			echo '<h4>Giao Dịch MOMO Thất Bại!!</h4>';
		}
		
	}else{
		if(isset($_GET['thanhtoan']) == 'paypal'){
			$code_order = rand(0,9999);
			$cart_payment = 'paypal';
			$ID_Khachhang = $_SESSION['ID_Khachhang'];
			//$id_dangky = $_SESSION['ID_Khachhang'];
			$sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM vanchuyen WHERE id_dangky = '$ID_Khachhang' LIMIT 1");  
		    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
		    $id_vanchuyen = $row_get_vanchuyen['id_vanchuyen'];
			//-------------Insert vào đơn hàng---------------------------------//
			$insert_cart = "INSERT INTO cart(ID_Khachhang,Code_Cart,Cart_Status,cart_payment,cart_vanchuyen) VALUE('".$ID_Khachhang."','".$code_order."',1,'".$cart_payment."','".$id_vanchuyen."')";

			$cart_query = mysqli_query($mysqli,$insert_cart);


			//--------------------------------------------------------------------//
			//if($cart_query){
				//them gio hang chi tiet
				foreach ($_SESSION['cart'] as $key => $value) {
					$ID_Sanpham = $value['id'];
					$soluong = $value['soluong'];
					$insert_order_details ="INSERT INTO cart_luudon(ID_Sanpham,Code_Cart,Soluongdon) VALUE('".$ID_Sanpham."','".$code_order."','".$soluong."')";
					mysqli_query($mysqli,$insert_order_details);
				}

		
			if($cart_query){
			//insert giỏ hàng
				echo '<h4>Giao Dịch Thanh Toán Bằng PAYPAL Thành Công!!</h4>';
				echo '<p>Vui lòng vào trang <a target="_black" href="#">lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn.</p>';

				$tieude = "Đặt hàng website PkMarket.com thành công!";
				$noidung = "<p>Cám ơn quý khách đã đặt hàng từ chúng tôi với mã đơn hàng: ".$code_order."</p>";
				$noidung.= "<h4>Đơn hàng đặt bao gồm:</h4>";
					foreach ($_SESSION['cart'] as $key => $val){
						$noidung.= "<ul style='border:1px solid green; margin: 10px;'>
							<li>".$val['tensanpham']."</li>
							<li>".number_format($val['giaban'],0,',','.')."Đ</li>
							<li>".$val['soluong']."</li>
						</ul>";
					}

				$maildathang = $_SESSION['email'];			
				$mail = new Mailer();
				$mail->dathangmail($tieude,$noidung,$maildathang);
			}else{
				echo '<h4>Giao Dịch PAYPAL Thất Bại!!</h4>';
			}
		}
	}


?>
<p>Cám Ơn Quý Khách Đã Mua Hàng, Chúng Tôi Sẽ Liên Hệ Quý Khách Trong Thời Gian Sớm Nhất.</p>