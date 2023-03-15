<p> Hình Thức Thanh Toán </p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Lịch Sử Đơn Hàng</a><span> </div>
  </div>
  <form action="Pages/Main/xulythanhtoan.php" method="POST">
    <div class="row">
          <?php
              $id_dangky = $_SESSION['ID_Khachhang'];
              $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM vanchuyen WHERE id_dangky = '$id_dangky' LIMIT 1");  
              $count = mysqli_num_rows($sql_get_vanchuyen);
              if($count>0){
                $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                $name = $row_get_vanchuyen['name'];
                $phone = $row_get_vanchuyen['phone'];
                $address = $row_get_vanchuyen['address'];
                $note = $row_get_vanchuyen['note'];
              }else{
                $name = '';
                $phone = '';
                $address = '';
                $note = '';
              }
          ?>
        <div class="col-md-8">
          <h5 style="padding: 10px">Thông Tin Vận Chuyển Và Khách Hàng</h5>
            <ul>
              <li>Họ Và Tên Vận Chuyển: <b><?php echo $name ?></b></li>
              <li>Số Điện Thoại: <b><?php echo $phone ?></b></li>
              <li>Địa Chỉ: <b><?php echo $address ?></b></li>
              <li>Ghi Chú: <b><?php echo $note ?></b></li>
            </ul>
            <!-- Giỏ Hàng -->
            <table style="width: 100%; text-align: center;border-collapse: collapse ;"border="1">
              <tr>
                <th>ID Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Hình Ảnh Sản Phẩm</th>
                <th>Giá Sản Phẩm</th>
                <th>Số Lượng</th>    
                <th>Thành Tiền</th>  
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
              </tr>
                  <?php
                }//foreach
                ?>
                  <tr>
                      <td colspan="7">
                        <p style="float: left;" >Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'VND';?></p>
                        <div style="clear: both"></div>
                        <?php
                        if(isset($_SESSION['dangky'])){
                        ?>  
                          <!-- <p><a href="index.php?quanly=vanchuyen">Hình Thức Vận Chuyển</a></p> -->
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
        </div>
        <style type="text/css">
          .col-md-4.hinhthucthanhtoan .form-check{
            margin: 10px;
          }
        </style>

            <div class="col-md-4 hinhthucthanhtoan"> 
              <h5>Hình Thức Thanh Toán</h5>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="tienmat" checked>
                <label class="form-check-label" for="exampleRadios2">Tiền Mặt</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyenkhoan" checked>
                <label class="form-check-label" for="exampleRadios2">Chuyển Khoản</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay" checked>
                <img src="Images/vnpay.png" height="32" width="32">
                <label class="form-check-label" for="exampleRadios4">Vnpay</label>
              </div>
               <input type="submit" name="redirect" value="Thanh Toán Ngay" class="btn btn-danger">
  </form>            
              
              <?php
                $tongtien=0;
                foreach ($_SESSION['cart'] as $key => $value) {
                  $thanhtien=$value['soluong']*$value['giaban'];
                  $tongtien+=$thanhtien;
                } 
                $tongtien_vnd = $tongtien;
                $tongtien_usd = round($tongtien/23000);
              ?>
              <input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">
              <div id="paypal-button-container"></div>

              <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="Pages/Main/xulythanhtoanmomo.php">
                <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">
                <input type="submit" name="momo" value="Thanh Toán Momo Qua Mã QRcode" class="btn btn-danger">
              </form>  

              <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="Pages/Main/xulythanhtoanmomo_atm.php">
                <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">
                <input style="margin-block:10px" type="submit" name="momo" value="Thanh Toán Momo Qua ATM" class="btn btn-danger">
              </form>  
             

            </div>
    </div>
  
</div>
