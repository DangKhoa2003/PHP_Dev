
<?php
$act = 'changePass';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'changePass':
        include "./View/changePass.php";
        break;
    case 'changePass_action':
        if (isset($_POST['submit_pass'])) {
            $passOldInput = md5($_POST['passwordOld']);
            $passNewInput = md5($_POST['passwordNew']);
            $admin = new admin();
            $passOld = $admin->getPassword($passOldInput);
            if($passOldInput !== $passOld['password']) {
                echo '<script> alert("Nhập lại mật khẩu cũ sai !!");</script>';
                include './View/changePass.php';
            } else {
                if($passNewInput === md5($_POST['confirmPassword'])) {
                    $admin->updatePassword($passNewInput);
                    echo '<script> alert("Đổi mật khẩu thành công !!");</script>';
                    include './View/adminLogin.php';
                } else {
                    echo '<script> alert("Xác nhận lại mật khẩu không đúng !!");</script>';
                    include './View/changePass.php';
                }
            }

        }
        break;
    case 'checkotp':
        if (isset($_POST["code1"])) {
            $codeCheck = ($_POST["code1"] * 1000) + ($_POST["code2"] * 100) + ($_POST["code3"] * 10) + $_POST["code4"];

            if ($codeCheck == $_SESSION['codeOTP']) {
                echo '<script> alert("Xác minh mã OTP thành công !!");</script>';
                include "./View/resetps.php";
            } else {
                echo '<script> alert("Mã OTP không chính xác !!");</script>';
                include "./View/OTP.php";
            }
        }

        break;
}
