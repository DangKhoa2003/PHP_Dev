<?php
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'categoryEdit') {
    $ac = 1;
  }
  if ($_GET['act'] == 'themCategory') {
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
          <h1 class="mb-3 mt-5 bread"><?php if ($ac == 1) {echo 'Update Category';} if($ac == 2) {echo 'Add New Category';}; ?></h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span><?php if ($ac == 1) {echo 'Update Category';} if($ac == 2) {echo 'Add New Category';}; ?></span></p>
        </div>

      </div>
    </div>
  </div>
</section>
<?php
if ($ac == 1) {
  echo '<div class="text-center mt-5"><h3><b>Update Category</b></h3></div>';
}
if ($ac == 2) {
  echo '<div class="text-center mt-5"><h3><b>Add New Category</b></h3></div>';
}
?>

<div class="row justify-content-center">
  <?php 
    if($ac == 2) {
      echo '<form action="index.php?action=category&act=loai_action" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" name="submit_file" value="Submit">
          </form>';
    }
  ?>

  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $loai = new loai();
    $result = $loai->getCategoryId($id);
    $mahh = $result['id'];
    $tenhh = $result['title'];
    $hinh = $result['image_name'];
    $featured = $result['featured'];
    $active = $result['active'];
  }

  ?>
  <?php
  if ($ac == 1) {
    echo '<form action="index.php?action=category&act=editCategory_action&id=' . $id . '" method="post" enctype="multipart/form-data">';
  }
  if ($ac == 2) {
    echo '<form action="index.php?action=category&act=addCategory_action" method="post" enctype="multipart/form-data">';
  }
  ?>

  <table class="table" style="border: 1px;">
    <tr>
      <td>Mã loại</td>
      <td><input type="text" class="form-control" name="maLoai" value="<?php if($ac == 1) {echo $mahh;}else if($ac == 2) {echo '';} ?>"/></td>
    </tr>

    <tr>
      <td>Tên loại</td>
      <td><input type="text" class="form-control" name="tenLoai" value="<?php if($ac == 1) {echo $tenhh;}else if($ac == 2) {echo '';} ?>" maxlength="100px"></td>
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
      <td>Đặc sắc</td>
      <td><input type="text" class="form-control" name="featured">
      </td>
    </tr>
    <tr>
      <td>Trạng thái</td>
      <td><input type="text" class="form-control" name="active">
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