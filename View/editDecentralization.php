<?php
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'editRole') {
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
          <h1 class="mb-3 mt-5 bread"><?php if ($ac == 1) {echo 'Update Role';} ?></h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span><?php if ($ac == 1) {echo 'Update Category';} if($ac == 2) {echo 'Add New Category';}; ?></span></p>
        </div>

      </div>
    </div>
  </div>
</section>
<?php
if ($ac == 1) {
  echo '<div class="text-center mt-5"><h3><b>Update Role</b></h3></div>';
}
if ($ac == 2) {
  echo '<div class="text-center mt-5"><h3><b>Add New Category</b></h3></div>';
}
?>

<div class="row justify-content-center">

  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = new user();
    $result = $user->getUser($id);
    $id = $result['id'];
    $fullName = $result['full_name'];
    $userName = $result['username'];
    $email = $result['email'];
    $address = $result['address'];
    $phoneNumber = $result['phone_number'];
    $role = $result['role'];
  }

  ?>
  <?php
  if ($ac == 1) {
    echo '<form action="index.php?action=decentralization&act=editRole_action&id=' . $id . '" method="post" enctype="multipart/form-data">';
  }
  if ($ac == 2) {
    echo '<form action="index.php?action=decentralization&act=addCategory_action" method="post" enctype="multipart/form-data">';
  }
  ?>

  <table class="table" style="border: 1px;">
    <tr>
      <td>ID</td>
      <td><input type="text" class="form-control" name="idUser" readonly value="<?php if($ac == 1) {echo $id;}else if($ac == 2) {echo '';} ?>"/></td>
    </tr>

    <tr>
      <td>Full Name</td>
      <td><input type="text" class="form-control" name="fullName" readonly value="<?php if($ac == 1) {echo $fullName;}else if($ac == 2) {echo '';} ?>" maxlength="100px"></td>
    </tr>

    <tr>
      <td>User Name</td>
      <td><input type="text" class="form-control" name="userName" readonly value="<?php if($ac == 1) {echo $userName;}else if($ac == 2) {echo '';} ?>" maxlength="100px"></td>
    </tr>
    
    <tr>
      <td>Address</td>
      <td><input type="text" class="form-control" name="address" readonly value="<?php if($ac == 1) {echo $address;}else if($ac == 2) {echo '';} ?>"></td>
      </td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td><input type="text" class="form-control" name="phone" readonly value="<?php if($ac == 1) {echo $phoneNumber;}else if($ac == 2) {echo '';} ?>"></td>
      </td>
    </tr>

    <tr>
      <td>Role</td>
      <td><input type="number" class="form-control" name="role" value="<?php if($ac == 1) {echo $role;}else if($ac == 2) {echo '';} ?>"></td>
      </td>
    </tr>

    <tr>
      <td colspan="2">
        <input type="submit" class="btn btn-primary px-5" style="font-size: 14px" value="<?php if($ac == 1) {echo 'Update Role';} else if($ac == 2) {echo 'Create';} ?>">
      </td>
    </tr>

  </table>
  </form>
</div>