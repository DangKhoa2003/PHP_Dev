<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Order Online</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
            </div>

          </div>
        </div>
      </div>
</section>
<div class="table-responsive container">
    <form action="" method="post">
        <table class="table table-bordered" border="0">
            <?php 
            $hd = new hoadon();
            $result = $hd->getOrder($_SESSION['sohd']);
            $sohdon = $result['masohd'];
            $ngay = $result['ngaydat'];
            $ten = $result['full_name'];
            $diachi = $result['address'];
            $dt = $result['phone_number'];
            $d = new DateTime($ngay);
            ?>
            <tr>
                <td colspan="4">
                    <h2 style="color: red;">Checkout</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2">Số Hóa đơn: <?php echo $sohdon;?></td>
                <td colspan="2"> Ngày lập: <?php echo $d->format('d/m/Y');?></td>
            </tr>
            <tr>
                <td colspan="2">Họ và tên:</td>
                <td colspan="2"><?php echo $ten;?></td>
            </tr>
            <tr>
                <td colspan="2">Địa chỉ: </td>
                <td colspan="2"><?php echo $diachi;?></td>
            </tr>
            <tr>
                <td colspan="2">Số điện thoại: </td>
                <td colspan="2"><?php echo $dt;?></td>
            </tr>
        </table>
        <!-- Thông tin sản phầm -->
        <table class="table table-bordered">
            <thead>

                <tr style="background-color: #f8b500">
                    <th>Số TT</th>
                    <th>Thông Tin Sản Phẩm</th>
                    <th>Tùy Chọn Của Bạn</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $j = 0;
                    $result= $hd->getOrderDetail($_SESSION['sohd']);
                    while ($set= $result->fetch()):
                        $j++;
                ?>
                <tr>
                    <!-- Thêm giá tiền vô trong database -->
                    <td><?php echo $j;?></td>
                    <td><?php echo $set['title'];?></td>
                    <td>Size: <?php echo $set['name_size'];?> </td>
                    <td>Đơn Giá: <?php echo $set['gia'];?> - Số Lượng: <?php echo $set['soluongmua'];?> <br />
                    </td>
                </tr>
                <?php 
                    endwhile;
                ?>
                <tr>
                    <td colspan="3">
                        <b>Tổng Tiền:</b>
                    </td>
                    <td style="text-align: center;">
                        $<b> 
                        
                            <?php 
                                $gh = new giohang();
                                echo $gh->getTotal();
                            ?>
                        </b>
                    </td>

                </tr>
            </tbody>
        </table>
    </form>
</div>
</div>