<p> Thông Tin Vận Chuyển </p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
      <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
      <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
      <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
      <div class="step"> <span><a href="index.php?quanly=donhangdadat" >Lịch Sử Đơn Hàng</a><span> </div>
    </div>
    <h5 style="padding: 10px;">Thông Tin Đơn Vận Chuyển</h5>
    <?php
      if(isset($_POST['themvanchuyen'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['ID_Khachhang'];
        $sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO vanchuyen(name, phone, address, note, id_dangky) VALUES ('$name','$phone','$address','$note','$id_dangky')");
        if($sql_them_vanchuyen){
          echo '<script>alert("Thêm Thông Tin Vận Chuyển Thành Công!!")</script>';
        }
      }elseif(isset($_POST['capnhatvanchuyen'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['ID_Khachhang'];
        $sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE vanchuyen SET name= '$name', phone= '$phone', address= '$address', note= '$note',id_dangky= '$id_dangky' WHERE id_dangky = '$id_dangky'");
        if($sql_update_vanchuyen){
          echo '<script>alert("Cập Nhật Thông Tin Vận Chuyển Thành Công!!")</script>';
        }
      } 
    ?>
    <!-- ------------------Giỏ Hàng--------------------- -->
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

      <div class="col-md-12">
        <form action="" autocomplete="off" method="POST">
          <div class="form-group">
            <label for="name">Họ Và Tên </label>
            <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="...">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="...">
          </div>
          <div class="form-group">
            <label for="address">Địa Chỉ</label>
            <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="...">
          </div>
          <div class="form-group">
            <label for="note">Ghi Chú</label>
            <input type="text" name="note" class="form-control" value="<?php echo $note ?>" placeholder="...">
          </div>

          <?php 
            if($name == '' && $phone == ''){
          ?>

            <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm thông tin vận chuyển</button>

          <?php
          }elseif($name != '' && $phone != ''){
          ?>
          
            <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập Nhật thông tin vận chuyển</button>
          
          <?php 
          }
          ?>

        </form>
       </div>

          <!-- -------------------------------------------- -->

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
                      <p><a href="index.php?quanly=thongtinthanhtoan">Thanh Toán</a></p>
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
</div>
