<?php 
    // Tạo được giỏ hàng cho khách hàng
    // kiểm tra khi nào tạo ? khi giỏ hàng chưa có
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $act="giohang";
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act) {
        case 'giohang':
            // Khi người dùng nhấn nút mua ngay thì chuyển qua đây gồm có
            if(isset($_POST['mahh'])) {
                $mahh = $_POST['mahh'];
                $soluong = $_POST['quantity'];
                $price = $_POST['price'];
                $size = $_POST['size'];
                // Controll yêu cầu model add toàn bộ thông tin vào trong giở hàng 
                $gh = new giohang();
                $gh->add_item($mahh, $soluong, $price, $size);
            }
        case 'delete_item':
            if(isset($_GET['id'])) {
                $key = $_GET['id'];
                $gh = new giohang();
                $gh->delete_items($key);
            }
            include "./View/cart.php";
            break;
        case 'update_item':
            // gửi toàn bộ
            if(isset($_POST['newqty'])) {
                $new_list=$_POST['newqty'];
                foreach($new_list as $key=>$qty) {
                    if($_SESSION['cart'][$key]['soluong'] != $qty) {
                        // nếu số lượng trong cart mà khác với số lượng new_list
                        $gh = new giohang();
                        $gh->update_items($key, $qty);
                    }
                }
            }
            include "./View/cart.php";
            break;
    }
?>