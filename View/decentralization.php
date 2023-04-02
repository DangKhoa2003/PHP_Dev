<section class="home-slider owl-carousel">

  <div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Decentralization</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Decentralization</span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="col-md-4 col-md-offset-4">
  <h3 class="mt-5"><b>Quản lí người dùng</b></h3>
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
    <a href="index.php?action=hoadon">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lí hóa đơn</button>
    </a>
  </div>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr class="table-danger">
        <th>ID</th>
        <th>Full Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Role</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $user = new user();
      $result = $user->getAllUser();
      while ($set = $result->fetch()) :

      ?>
        <tr>
          <td><?php echo $set['id']; ?> </td>
          <td><?php echo $set['full_name']; ?></td>
          <td><?php echo $set['username']; ?></td>
          <td><?php echo $set['email']; ?></td>
          <td><?php echo $set['address']; ?></td>
          <td><?php echo $set['phone_number']; ?></td>
          <td><?php echo $set['role']; ?></td>
          <td><a href="index.php?action=decentralization&act=editRole&id=<?php echo $set['id'] ?>"><i style="font-size: 20px; cursor: pointer;" class="fas fa-user-edit"></i></a></td>
          <td><a href="index.php?action=decentralization&act=deleteUser&id=<?php echo $set['id']?>"><i style="font-size: 20px; cursor: pointer;" class="fas fa-user-times"></i></a></td>
        </tr>
      <?php
      endwhile;
      ?>
    </tbody>
  </table>
</div>