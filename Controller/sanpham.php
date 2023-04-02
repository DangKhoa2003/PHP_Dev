<?php 
    $act='sanpham';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act) {
        case 'sanpham':
            include './View/sanpham.php';
            break;
        case 'khuyenmai':
            include './View/sanpham.php';
            break;
        case 'detail':
            include './View/sanphamchitiet.php';
            break;
        case 'giohang':
            include './View/cart.php';
            break;
        case 'timkiem':
            include './View/sanpham.php';
            break;
        case 'comment':
            if(isset($_GET['id'])) {
                $mahh = $_GET['id'];
                $makh = $_SESSION['makh'];
                $noidung = $_POST['comment'];
                $user = new user();
                $user->insertComment($mahh, $makh, $noidung);
            }
            include './View/sanphamchitiet.php';
            break;
    }
?>