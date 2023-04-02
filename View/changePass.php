<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Forget Password</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Forget</span></p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="login-block">
  <div class="container">
    <div class="row justify-content-center py-5">
      <div class="col-md-4 login-sec">
        <h3 class="text-center"><b>Thay đổi mật khẩu</b></h3>
        <form action="index.php?action=changePass&act=changePass_action" class="login-form border-info" method="post">
          <div class="form-group">
            <label for="passwordOld" class="text-uppercase">Mật khẩu cũ</label>
            <input type="password" autofocus="" name="passwordOld" class="form-control" placeholder="VD: example123">
          </div>

          <div class="form-group">
            <label for="passwordNew" class="text-uppercase">Mật khẩu mới</label>
            <input type="password" autofocus="" name="passwordNew" class="form-control" placeholder="VD: example123">
          </div>

          <div class="form-group">
            <label for="confirmPassword" class="text-uppercase">Xác nhận mật khẩu</label>
            <input type="password" autofocus="" name="confirmPassword" class="form-control" placeholder="VD: example123">
          </div>

          <div class="form-check">
            <input value="Check" class="btn btn-danger py-2" type="submit" name="submit_pass">

          </div>

        </form>

        <div class="copy-text">Thank you for coming to us ❤️</div>
      </div>
    </div>
</section>