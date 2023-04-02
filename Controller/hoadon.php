<?php 
     $act = "hoadon";
     if(isset($_GET['act'])) {
        $act = $_GET['act'];
     }
     switch($act) {
         case 'hoadon':
            include './View/hoadon.php';
            break;
        case 'editBill':
            include './View/editBill.php';
            break;
        case 'editBill_action':
            if(isset($_GET['id'])) {
                $masohd=$_GET['id'];
                $makh = $_POST['makh'];
                $ngaydat = $_POST['ngaydat'];

                $tongtien=$_POST['tongtien'];
                $hoadon = new hoadon();
                $check = $hoadon->updateBill($masohd,$makh,$ngaydat,$tongtien);
                if($check !== false) {
                    echo '<script> alert ("Cập nhật thành công") </script>';
                    include './View/hoadon.php';
                } else {
                    echo '<script> alert ("Cập nhật ko thành công") </script>';
                    include './View/editBill.php';
                }
            }
            break;
        case 'deleteBill':
            if(isset($_GET['id'])) {
                $masohd=$_GET['id'];
                $hoadon = new hoadon();
                $hoadon->deleteBill($masohd);
                echo '<script> alert ("Xóa hóa đơn thành công") </script>';
                include './View/hoadon.php';
            }
            break;
    }
?>