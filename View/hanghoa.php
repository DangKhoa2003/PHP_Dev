<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Product Management</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product Management</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<div class="col-md-4 col-md-offset-4">
  <h3 class="mt-5"><b>DANH SÁCH HÀNG HÓA</b></h3>
</div>
<div class="row col-12 justify-content-center">
  <div>
    <a href="index.php?action=hanghoa&act=them">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Thêm sản phẩm</button>
    </a>
    <a href="index.php?action=category">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lý phân loại</button>
    </a>
    <a href="index.php?action=thongke">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Thống kê hàng hóa</button>
    </a>
    <a href="index.php?action=decentralization">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Phân Quyền</button>
    </a>
    <a href="index.php?action=hoadon">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lí hóa đơn</button>
    </a>
    <a href="index.php?action=invoiceDetails">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lí chi tiết hóa đơn</button>
    </a>
  </div>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr class="table-danger">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Hình</th>
        <th>Category</th>
        <th>Mô tả</th>
        <th>Số lượng tồn</th>
        <th>Size</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $hh = new hanghoa();
        $result = $hh->getHangHoaAll();
        while($set=$result->fetch()):

      ?>
      <tr>
        <td><?php echo $set['id']; ?> </td> 
        <td><?php echo $set['title']; ?></td> 
        <td><?php echo $set['price']; ?></td> 
        <td><?php echo $set['sales']; ?></td> 
        <td><img width="50px" height="50px" src="Content/images/<?php echo $set['image_name']; ?>" /></td> 
        <td><?php echo $set['category']; ?></td> 
        <td><?php echo $set['description']; ?></td> 
        <td><?php echo $set['inventory']; ?></td> 
        <td>
          M, L, XL
        </td>
        <td><a href="index.php?action=hanghoa&act=edit&id=<?php echo $set['id']?>">Cập nhật</a></td> 
        <td><a href="index.php?action=hanghoa&act=delete_action&id=<?php echo $set['id']?>">Xóa</a></td> 
      </tr>
      <?php 
        endwhile;
      ?>
    </tbody>
  </table>
</div>