<?php
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'edit') {
    $ac = 1;
  }
  if ($_GET['act'] == 'them') {
    $ac = 2;
  }
}
?>
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread"><?php if ($ac == 1) {echo 'Update Product';} if($ac == 2) {echo 'Add New Product';}; ?></h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span><?php if ($ac == 1) {echo 'Update Product';} if($ac == 2) {echo 'Add New Product';}; ?></span></p>
        </div>

      </div>
    </div>
  </div>
</section>
<?php
if ($ac == 1) {
  echo '<div class="text-center mt-5"><h3><b>Update Product</b></h3></div>';
}
if ($ac == 2) {
  echo '<div class="text-center mt-5"><h3><b>Add New Product</b></h3></div>';
}
?>

<div class="row justify-content-center">
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hh = new hanghoa();
    $result = $hh->getHangHoaId($id);
    $mahh = $result['id'];
    $tenhh = $result['title'];
    $dongia = $result['price'];
    $giamgia = $result['sales'];
    $hinh = $result['image_name'];
    $nhom = $result['category_id'];
    $tenloai = $result['category']; 
    $mota = $result['description'];
    $soluongton = $result['inventory'];
  }

  ?>
  <?php
  if ($ac == 1) {
    echo '<form action="index.php?action=hanghoa&act=edit_action&id=' . $id . '" method="post" enctype="multipart/form-data">';
  }
  if ($ac == 2) {
    echo '<form action="index.php?action=hanghoa&act=addProd_action" method="post" enctype="multipart/form-data">';
  }
  ?>

  <table class="table" style="border: 1px;">
    <tr>
      <td>Mã hàng</td>
      <td><input type="text" <?php if($ac == 1) {echo 'readonly';}else if($ac == 2) {echo '';} ?> class="form-control" name="mahh" value="<?php if($ac == 1) {echo $mahh;}else if($ac == 2) {echo '';} ?>"/></td>
    </tr>
    <tr>
      <td>Tên hàng</td>
      <td><input type="text" class="form-control" name="tenhh" value="<?php if($ac == 1) {echo $tenhh;}else if($ac == 2) {echo '';} ?>" maxlength="100px"></td>
    </tr>
    <tr>
      <td>Đơn giá</td>
      <td><input type="text" class="form-control" name="dongia" value="<?php if($ac == 1) {echo $dongia;}else if($ac == 2) {echo '';} ?>"></td>
    </tr>
    <tr>
      <td>Giảm giá</td>
      <td><input type="text" class="form-control" name="giamgia" value="<?php if($ac == 1) {echo $giamgia;}else if($ac == 2) {echo '';} ?>"></td>
    </tr>
    <tr>
      <td>Hình</td>
      <td>

        <label><img width="50px" height="50px" src="Content/images/<?php if($ac == 1) {echo $hinh;} ?>"></label>
        Chọn file để upload:
        <input type="file" name="image" id="fileupload">

      </td>
    </tr>
    <tr>
      <td>Mã loại</td>
      <td>
        <input type="text" class="form-control" name="nhom" value="<?php if($ac == 1) {echo $nhom;}else if($ac == 2) {echo '';} ?>">
      </td>
    </tr>
    <tr>
      <td>Tên loại</td>
      <td>
        <select name="tenloai" class="form-control" style="color: red;"style="width:150px;">
          <?php
          $dl = new loai();
          $result = $dl->getLoai();
          while ($set = $result->fetch()):

          ?>
            <option <?php if($ac == 1) {
                if ($nhom == $set['id']) echo "selected";
            } ?>value="<?php echo $set['title']; ?>">
              <?php echo $set['title']; ?></option>
          <?php
          endwhile;
          ?>
        </select>
      </td>
    </tr>

    <tr>
      <td>Mô tả</td>
      <td><input type="text" class="form-control" name="mota" value="<?php if($ac == 1) {echo $mota;}else if($ac == 2) {echo '';} ?>">
      </td>
    </tr>
    <tr>
      <td>Số lượng tồn</td>
      <td><input type="text" class="form-control" name="slt" value="<?php if($ac == 1) {echo $soluongton;}else if($ac == 2) {echo '';} ?>">
      </td>
    </tr>

    <tr>
      <td colspan="2">
        <input type="submit" class="btn btn-primary px-5" style="font-size: 14px" value="<?php if($ac == 1) {echo 'Update';} else if($ac == 2) {echo 'Create';} ?>">
      </td>
    </tr>

  </table>
  </form>
</div>