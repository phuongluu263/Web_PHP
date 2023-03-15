<?php
	session_start();
	include('../../ADMINcp/Config/config.php');
	require('../../Mail/sendmail.php');
	require_once('./config_vnpay.php');


	$ID_Khachhang = $_SESSION['ID_Khachhang'];
	$code_order = rand(0,9999);
	$cart_payment = $_POST['payment'];
	//Lấy ID thông tin vận chuyển
	$id_dangky = $_SESSION['ID_Khachhang'];
    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM vanchuyen WHERE id_dangky = '$id_dangky' LIMIT 1");  
    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
    $id_vanchuyen = $row_get_vanchuyen['id_vanchuyen'];
    $tongtien = 0;

    foreach ($_SESSION['cart'] as $key => $value) {
		$thanhtien=$value['soluong']*$value['giaban'];
  		$tongtien+=$thanhtien;
  		
	}


    if($cart_payment == 'tienmat' || $cart_payment == 'chuyenkhoan'){
	    //-------------Insert vào đơn hàng---------------------------------//
		$insert_cart = "INSERT INTO cart(ID_Khachhang,Code_Cart,Cart_Status,cart_payment,cart_vanchuyen) VALUE('".$ID_Khachhang."','".$code_order."',1,'".$cart_payment."','".$id_vanchuyen."')";
		$cart_query = mysqli_query($mysqli,$insert_cart);


		//--------------------------------------------------------------------//
		if($cart_query){
			//them gio hang chi tiet
			foreach ($_SESSION['cart'] as $key => $value) {
				$ID_Sanpham = $value['id'];
				$soluong = $value['soluong'];
				$insert_order_details ="INSERT INTO cart_luudon(ID_Sanpham,Code_Cart,Soluongdon) VALUE('".$ID_Sanpham."','".$code_order."','".$soluong."')";
				mysqli_query($mysqli,$insert_order_details);
			}
			// Gửi mail-----------------//
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
		}
		unset($_SESSION['cart']);
		header('Location:../../index.php?quanly=camon1');

	}elseif($cart_payment == 'vnpay'){
		//Thanh toán bằng VNPAY
			$vnp_TxnRef = $code_order; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
			$vnp_OrderInfo = 'Thanh Toán Đơn Hàng Tại Website PKMarket.com';
			$vnp_OrderType = 'billpayment';
			$vnp_Amount = $tongtien * 100;
			$vnp_Locale = 'vn';
			$vnp_BankCode = 'NCB';
			$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
			$vnp_ExpireDate = $expire;

			$inputData = array(
			    "vnp_Version" => "2.1.0",
			    "vnp_TmnCode" => $vnp_TmnCode,
			    "vnp_Amount" => $vnp_Amount,
			    "vnp_Command" => "pay",
			    "vnp_CreateDate" => date('YmdHis'),
			    "vnp_CurrCode" => "VND",
			    "vnp_IpAddr" => $vnp_IpAddr,
			    "vnp_Locale" => $vnp_Locale,
			    "vnp_OrderInfo" => $vnp_OrderInfo,
			    "vnp_OrderType" => $vnp_OrderType,
			    "vnp_ReturnUrl" => $vnp_Returnurl,
			    "vnp_TxnRef" => $vnp_TxnRef,
			    "vnp_ExpireDate"=>$vnp_ExpireDate

			);

			if (isset($vnp_BankCode) && $vnp_BankCode != "") {
			    $inputData['vnp_BankCode'] = $vnp_BankCode;
			}
			// if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
			//     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
			// }

			//var_dump($inputData);
			ksort($inputData);
			$query = "";
			$i = 0;
			$hashdata = "";
			foreach ($inputData as $key => $value) {
			    if ($i == 1) {
			        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
			    } else {
			        $hashdata .= urlencode($key) . "=" . urlencode($value);
			        $i = 1;
			    }
			    $query .= urlencode($key) . "=" . urlencode($value) . '&';
			}

			$vnp_Url = $vnp_Url . "?" . $query;
			if (isset($vnp_HashSecret)) {
			    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
			    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
			}
			$returnData = array('code' => '00'
			    , 'message' => 'success'
			    , 'data' => $vnp_Url);
			    if (isset($_POST['redirect'])) {
			    	$_SESSION['code_cart'] = $code_order;
			    	//-------------Insert vào đơn hàng---------------------------------//
					$insert_cart = "INSERT INTO cart(ID_Khachhang,Code_Cart,Cart_Status,cart_payment,cart_vanchuyen) VALUE('".$ID_Khachhang."','".$code_order."',1,'".$cart_payment."','".$id_vanchuyen."')";
					$cart_query = mysqli_query($mysqli,$insert_cart);
					

						//--------------------------------------------------------------------//
						//them gio hang chi tiet
						foreach ($_SESSION['cart'] as $key => $value) {
							$ID_Sanpham = $value['id'];
							$soluong = $value['soluong'];
							$insert_order_details ="INSERT INTO cart_luudon(ID_Sanpham,Code_Cart,Soluongdon) VALUE('".$ID_Sanpham."','".$code_order."','".$soluong."')";
							mysqli_query($mysqli,$insert_order_details);
						}
					if($cart_query){	
						// Gửi mail-----------------//
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
					}
					//unset($_SESSION['cart']);
			        header('Location: ' . $vnp_Url);
			        die();
			    } else {
			        echo json_encode($returnData);
			    }
	//End thanh toán bằng vnpay//
			    
	}
	elseif($cart_payment == 'paypal'){
		//Thanh toán bằng PAYPAL
	}
	elseif($cart_payment == 'momo'){
		
		//Thanh toán bằng MOMO
	}	




		
	
?>

