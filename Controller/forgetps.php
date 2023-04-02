
<?php
$act = 'forgetps';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forgetps':
        include "./View/forgetpassword.php";
        break;
    case 'forget_action':
        if (isset($_POST['submit_email'])) {
            $_SESSION['email'] = array();
            $email = $_POST['email'];
            $user = new user();
            $kqemail = $user->getEmail($email);
            if ($kqemail != false) {
                $code = random_int(1, 100);
                // echo $code;
                $item = array(
                    'code' => $code,
                    'email' => $email,
                );
                $_SESSION['email'][] = $item;
                // gửi mail
                $mail = new PHPMailer();
                $mail->CharSet = 'utf-8';
                $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
                $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
                $mail->Username = 'tranhadangkhoa2003@gmail.com';                    //Sets SMTP username
                $mail->Password = 'uemaumpxlwtozzgs'; //Phplytest20@php					//Sets SMTP password
                $mail->SMTPSecure = 'tls';                            //Sets connection prefix. Options are "", "ssl" or "tls"
                $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
                $mail->Port = "587";                                //Sets the default SMTP server port
                $mail->From = 'tranhadangkhoa2003@gmail.com';                    //Sets the From email address for the message
                $mail->FromName = 'Khoa';                //Sets the From name of the message
                $mail->AddAddress($email, 'reciever_name');        //Adds a "To" address
                //$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
                $mail->Subject = 'Reset Password';                //Sets the Subject of the message
                $mail->IsHTML(true);                            //Sets message type to HTML				
                $mail->Body = 'Cấp lại mã code ' . $code . '';                //An HTML or plain text message body
                if ($mail->Send())                                //Send an Email. Return true on success or false on error
                {
                    echo '<script>alert("Check your email and click on the link sent to your email");</script>';
                    include "./View/resetpw.php";
                } else {
                    echo "Mail Error - > " . $mail->ErrorInfo;
                    include './View/forgetpassword.php';
                }
            } else {
                echo '<script>alert("Địa chỉ mail không tồn tại");</script>';
                include './View/forgetpassword.php';
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
    case 'resetps':
        if (isset($_SESSION['email'])) {
            $codenew = $_POST['password'];

            foreach($_SESSION['email'] as $key=>$item) {

                if ($item['code']  == $codenew) {
                    $emailold = $item['email'];
                    $passnew = md5($codenew);
                    $usr = new user();
                    $usr->updateEmail($emailold, $passnew);
                    echo '<script> alert("Đổi mật khẩu thành công !!");</script>';
                } else {
                    echo '<script> alert("Vui lòng kiểm tra lại mã code !!");</script>';
                }
            }
        }
        include "./View/login.php";
        break;
}
