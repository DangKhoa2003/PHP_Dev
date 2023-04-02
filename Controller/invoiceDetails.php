<?php 
     $act = "invoiceDetails";
     if(isset($_GET['act'])) {
        $act = $_GET['act'];
     }
     switch($act) {
         case 'invoiceDetails':
            include './View/invoiceDetails.php';
            break;
        case 'editDetailsBill':
            include './View/editDetailsBill.php';
            break;
        case 'editDetailsBill_action':
            if(isset($_GET['id'])) {
                $masohd=$_GET['id'];
                $mahh = $_POST['mahh'];
                $soluongmua = $_POST['soluongmua'];

                $nameSize=$_POST['nameSize'];
                $gia=$_POST['gia'];
                $thanhtien=$_POST['thanhtien'];
                $tinhtrang=$_POST['tinhtrang'];

                $hoadon = new hoadon();
                $check = $hoadon->updateDetailsBill($masohd,$mahh,$soluongmua,$nameSize, $gia, $thanhtien, $tinhtrang);
                if($check !== false) {
                    echo '<script> alert ("Cập nhật thành công") </script>';
                    include './View/invoiceDetails.php';

                } else {
                    echo '<script> alert ("Cập nhật ko thành công") </script>';
                    include './View/editDetailsBill.php';
                }
            }
            break;
        case 'deleteDetailsBill':
            if(isset($_GET['id'])) {
                $masohd=$_GET['id'];
                $hoadon = new hoadon();
                $hoadon->deleteDetailsBill($masohd);
                echo '<script> alert ("Xóa chi tiết hóa đơn thành công") </script>';
                include './View/hoadon.php';
            }
            break;
    }
?>