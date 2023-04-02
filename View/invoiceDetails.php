<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Invoice Details</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Invoice Details</span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="col-md-4 col-md-offset-4">
  <h3 class="mt-5"><b>Quản lí hóa đơn</b></h3>
</div>
<div class="row col-12 justify-content-center">
  <div>
    <a href="index.php?action=hanghoa">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lý hàng hóa</button>
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
  </div>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr class="table-danger">
        <th>ID Bill</th>
        <th>ID Product</th>
        <th>Số lượng mua</th>
        <th>Size</th>
        <th>Giá</th>
        <th>Thành tiền</th>
        <th>Tình trạng</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hoadon = new hoadon();
      $result = $hoadon->getAllDetailsBill();
      while ($set = $result->fetch()) :

      ?>
        <tr>
          <td><?php echo $set['masohd']; ?> </td>
          <td><?php echo $set['mahh']; ?></td>
          <td><?php echo $set['soluongmua']; ?></td>
          <td><?php echo $set['name_size']; ?></td>
          <td><?php echo $set['gia']; ?></td>
          <td><?php echo $set['thanhtien']; ?></td>
          <td><?php echo $set['tinhtrang']; ?></td>
          <td><a href="index.php?action=invoiceDetails&act=editDetailsBill&id=<?php echo $set['masohd'] ?>"><i style="font-size: 20px; cursor: pointer;" class="fas fa-edit"></i></a></td>
          <td><a href="index.php?action=invoiceDetails&act=deleteDetailsBill&id=<?php echo $set['masohd']?>"><i style="font-size: 20px; cursor: pointer;" class="fas fa-trash"></i></a></td>
        </tr>
      <?php
      endwhile;
      ?>
    </tbody>
  </table>
</div>