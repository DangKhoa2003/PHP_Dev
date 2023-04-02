<?php 
    $act = 'dangky';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'dangky':
            include './View/registration.php';
            break;
        case 'dangky_action':

            // Khi người dùng nhấn nút đăng ký, nó chuyển qua đây là tên, địa chỉ...
            if(isset($_POST['txttenkh'])) {
                $tenkh = $_POST['txttenkh'];
                $diachi = $_POST['txtdiachi'];
                $sodt = $_POST['txtsodt'];
                
                $username = $_POST['txtusername'];
                $email = $_POST['txtemail'];
                $pass = $_POST['txtpass'];
                // mật khẩu người dùng đăng nhập sẽ dùng vào bảng khách hàng
                $crypt=md5($pass);
                // trước khi insert kiểm tra xem $username có tồn tại trong database hay chưa
                $ur= new user();
                $check = $ur->InsertUser($tenkh, $username, $crypt, $email, $diachi, $sodt);
                if($check!='false') {
                    echo '<script>alert("Đăng ký thành công")</script>';
                    include "./View/home.php";
                } else {
                    echo '<script>alert("Đăng ký ko thành công")</script>';
                    include './View/registration.php';
                }
            }
            break;
    }
?>