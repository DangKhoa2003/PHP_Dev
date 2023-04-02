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
        <!-- <h3 class="text-center"><b>Login Now</b></h3> -->
      
      
        <form  action="index.php?action=changePass&act=resetpsAdmin" class="login-form" method="post">
        
            <input type="hidden" name="email" value="">
            <p>Enter the code we sent to your email</p>
            <div class="d-flex justify-content-center align-content-center">
              <input id="ipnPassword" type="password" required="" autofocus="" name="password" class="form-control" placeholder="VD: 1234...">
              <div class="input-group-append">
                <button class="btn btn-outline-success" type="button" id="btnPassword">
                  <span class="icon icon-eye iconEye active h5"></span>
                  <span class="icon icon-eye-slash iconEye h5"></span>
                </button>
              </div>
            </div>
            <input value="Check" class="btn btn-danger py-2 mt-4" type="submit" name="submit_password">


        </form>
      
        <div class="copy-text">Thank you for coming to us ❤️</div>
      </div>
    </div>
</section>

<script>
  // step 1
const ipnElement = document.querySelector('#ipnPassword')
const btnElement = document.querySelector('#btnPassword')
const iconEye = document.querySelector('.icon-eye')
const iconEyeSlash = document.querySelector('.icon-eye-slash')
// step 2
btnElement.addEventListener('click', function() {
  // step 3
  const currentType = ipnElement.getAttribute('type')
  // step 4
  ipnElement.setAttribute(
    'type',
    currentType === 'password' ? 'text' : 'password'
  )
  if(iconEye.classList.contains('active')) {
    iconEye.classList.remove('active');
    iconEyeSlash.classList.add('active');
  } else {
    iconEye.classList.add('active');
    iconEyeSlash.classList.remove('active');
  }
})

</script>