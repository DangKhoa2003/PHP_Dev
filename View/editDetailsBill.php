<?php
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'editDetailsBill') {
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
          <h1 class="mb-3 mt-5 bread"><?php if ($ac == 1) {echo 'Edit Details Bill';} ?></h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span><?php if ($ac == 1) {echo 'Edit Bill';} ?></span></p>
        </div>

      </div>
    </div>
  </div>
</section>
<?php
if ($ac == 1) {
  echo '<div class="text-center mt-5"><h3><b>Edit Details Bill</b></h3></div>';
}

?>

<div class="row justify-content-center">

  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hoadon = new hoadon();
    $result = $hoadon->getDetailsBill($id);
    $masohd = $result['masohd'];
    $mahh = $result['mahh'];
    $soluongmua = $result['soluongmua'];
    $nameSize = $result['name_size'];
    $gia = $result['gia'];
    $thanhtien = $result['thanhtien'];
    $tinhtrang = $result['tinhtrang'];

  }

  ?>
  <?php
  if ($ac == 1) {
    echo '<form action="index.php?action=invoiceDetails&act=editDetailsBill_action&id=' . $masohd . '" method="post" enctype="multipart/form-data">';
  }
  ?>

  <table class="table" style="border: 1px;">
    <tr>
      <td>ID Bill</td>
      <td><input type="text" class="form-control" name="masohd"  value="<?php if($ac == 1) {echo $masohd;}else if($ac == 2) {echo '';} ?>"/></td>
    </tr>

    <tr>
      <td>ID Product</td>
      <td><input type="text" class="form-control" name="mahh"  value="<?php if($ac == 1) {echo $mahh;}else if($ac == 2) {echo '';} ?>" maxlength="100px"></td>
    </tr>

    <tr>
      <td>Số lượng mua</td>
      <td><input type="text" class="form-control" name="soluongmua"  value="<?php if($ac == 1) {echo $soluongmua;}else if($ac == 2) {echo '';} ?>" maxlength="100px"></td>
    </tr>
    
    <tr>
      <td>Size</td>
      <td><input type="text" class="form-control" name="nameSize"  value="<?php if($ac == 1) {echo $nameSize;}else if($ac == 2) {echo '';} ?>"></td>
      </td>
    </tr>

    <tr>
      <td>Gía</td>
      <td><input type="text" class="form-control" name="gia"  value="<?php if($ac == 1) {echo $gia;}else if($ac == 2) {echo '';} ?>"></td>
      </td>
    </tr>

    <tr>
      <td>Thành tiền</td>
      <td><input type="text" class="form-control" name="thanhtien"  value="<?php if($ac == 1) {echo $thanhtien;}else if($ac == 2) {echo '';} ?>"></td>
      </td>
    </tr>

    <tr>
      <td>Tình trạng</td>
      <td><input type="text" class="form-control" name="tinhtrang"  value="<?php if($ac == 1) {echo $tinhtrang;}else if($ac == 2) {echo '';} ?>"></td>
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