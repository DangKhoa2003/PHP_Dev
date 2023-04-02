<?php 
    $act = 'dangnhapAdmin';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act) {
        case 'dangnhapAdmin':
            include './View/adminLogin.php';
            break;
        case 'dangnhapAdmin_action':
            if(isset($_POST['txtuser']) && isset($_POST['txtpass'])) {
                $user = $_POST['txtuser']; //admin
                $pass = md5($_POST['txtpass']); // password
                // kiểm tra xem có tồn tại trong database

                $admin = new admin();
                $check = $admin->loginAdmin($user, $pass);
                if($check != false) {
                    $_SESSION["admin"] = $check['username'];
                    echo '<script>alert("Đăng nhập thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=../Test/index.php?action=hanghoa" />';
                } else {
                    echo '<script>alert("Bạn đăng nhập sai");</script>';
                    include './View/dangnhap.php';
                }
            }
            break;
    }
?>