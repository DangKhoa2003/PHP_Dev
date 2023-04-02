<?php
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'editBill') {
    $ac = 1;
  }
}
?>
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread"><?php if ($ac == 1) {echo 'Edit Bill';} ?></h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span><?php if ($ac == 1) {echo 'Edit Bill';} ?></span></p>
        </div>

      </div>
    </div>
  </div>
</section>
<?php
if ($ac == 1) {
  echo '<div class="text-center mt-5"><h3><b>Edit Bill</b></h3></div>';
}

?>

<div class="row justify-content-center">

  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hoadon = new hoadon();
    $result = $hoadon->getBill($id);
    $masohd = $result['masohd'];
    $makh = $result['makh'];
    $ngaydat = $result['ngaydat'];
    $tongtien = $result['tongtien'];

  }

  ?>
  <?php
  if ($ac == 1) {
    echo '<form action="index.php?action=hoadon&act=editBill_action&id=' . $masohd . '" method="post" enctype="multipart/form-data">';
  }
  ?>

  <table class="table" style="border: 1px;">
    <tr>
      <td>ID Bill</td>
      <td><input type="text" class="form-control" name="masohd"  value="<?php if($ac == 1) {echo $masohd;}else if($ac == 2) {echo '';} ?>"/></td>
    </tr>

    <tr>
      <td>ID User</td>
      <td><input type="text" class="form-control" name="makh"  value="<?php if($ac == 1) {echo $makh;}else if($ac == 2) {echo '';} ?>" maxlength="100px"></td>
    </tr>

    <tr>
      <td>Ngày đặt</td>
      <td><input type="text" class="form-control" name="ngaydat"  value="<?php if($ac == 1) {echo $ngaydat;}else if($ac == 2) {echo '';} ?>" maxlength="100px"></td>
    </tr>
    
    <tr>
      <td>Total</td>
      <td><input type="text" class="form-control" name="tongtien"  value="<?php if($ac == 1) {echo $tongtien;}else if($ac == 2) {echo '';} ?>"></td>
      </td>
    </tr>

    <tr>
      <td colspan="2">
        <input type="submit" class="btn btn-primary px-5" style="font-size: 14px" value="<?php if($ac == 1) {echo 'Update Bill';} else if($ac == 2) {echo 'Create';} ?>">
      </td>
    </tr>

  </table>
  </form>
</div>