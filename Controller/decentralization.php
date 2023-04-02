<?php 
    $act = 'decentralization';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act) {
        case 'decentralization':
            include "./View/decentralization.php";
            break;
        case 'editRole':
            include "./View/editDecentralization.php";
            break;
        case 'editRole_action':
            if(isset($_GET['id'])) {
                $idUser=$_GET['id'];
                $fullName = $_POST['fullName'];
                $userName = $_POST['userName'];

                $address=$_POST['address'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];
                $user = new user();
                $check = $user->updateRole($idUser,$fullName,$userName,$address,$phone,$role);
                if($check !== false) {
                    echo '<script> alert ("Cập nhật thành công") </script>';
                    include './View/decentralization.php';
                } else {
                    echo '<script> alert ("Cập nhật ko thành công") </script>';
                    include './View/editDecentralization.php';
                }
            }
            break;
        case 'deleteUser':
            if(isset($_GET['id'])) {
                $idUser=$_GET['id'];
                $user = new user();
                $user->deleteUser($idUser);
                echo '<script> alert ("Xóa người dùng thành công") </script>';
                include './View/decentralization.php';
            }
            break;
        default:
            // code...
            break;
    }
?>