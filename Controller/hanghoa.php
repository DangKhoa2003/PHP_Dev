<?php 
    $act = "hanghoa";
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act) {
        case 'hanghoa':
            include './View/hanghoa.php';
            break;
        case 'edit':
            include './View/edithanghoa.php';
            break;
        case 'them':
            include './View/edithanghoa.php';
            break;
        case 'delete_action':
            if(isset($_GET['id'])) {
                $mahh=$_GET['id'];
                $hanghoa = new hanghoa();
                $hanghoa->deleteProd($mahh);
                echo '<script> alert ("Xóa sản phẩm thành công") </script>';
                include './View/hanghoa.php';
            }
            break;
        case 'edit_action':
            if(isset($_GET['id'])) {
                $mahh=$_GET['id'];
                $tenhh = $_POST['tenhh'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $hinh = $_FILES['image']['name'];
                $Nhom=$_POST['nhom'];
                $mota = $_POST['mota'];
                $soluongton = $_POST['slt'];
                $tenloai = $_POST['tenloai'];
                $hh = new hanghoa();
                $check = $hh->updatesp($mahh,$tenhh,$mota,$dongia,$hinh,$Nhom,$giamgia,$soluongton,$tenloai);
                if($check !== false) {
                    uploadimage();
                    echo '<script> alert ("Cập nhật thành công") </script>';
                    include './View/hanghoa.php';
                } else {
                    echo '<script> alert ("Cập nhật ko thành công") </script>';
                    include './View/edithanghoa.php';
                }
            }
            break;
        case 'addProd_action':
            if(isset($_POST['mahh'])) {
                $mahh= $_POST['mahh'];
                $tenhh = $_POST['tenhh'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $hinh = $_FILES['image']['name'];
                $Nhom=$_POST['nhom'];
                $mota = $_POST['mota'];
                $soluongton = $_POST['slt'];
                $tenloai = $_POST['tenloai'];
                $hh = new hanghoa();
                $checkInsert = $hh->createProd($mahh,$tenhh,$mota,$dongia,$hinh,$Nhom,$giamgia,$soluongton,$tenloai);
                if($checkInsert !== false) {
                    uploadimage();
                    echo '<script> alert ("Thêm sản phẩm thành công") </script>';
                    include './View/hanghoa.php';
                } else {
                    echo '<script> alert ("Thêm sản phẩm ko thành công") </script>';
                    include './View/hanghoa.php';
                }
            }
            break;
    }
?>