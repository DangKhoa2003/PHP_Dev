<?php 
    $act = 'thongke';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act) {
        case 'thongke':
            include "./View/thongke.php";
            break;
        default:
            // code...
            break;
    }
?>