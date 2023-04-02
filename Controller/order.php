<?php 
    // Khi insert dữ liệu, thì insert vào bảng chỉ chứa khóa chính trước, sau đó moi insert vào bảng chứa khóa ngoại 
    if(isset($_SESSION['makh'])) {
        // tiến hành insert vào bảng hóa đơn trước, Model
        $hd = new hoadon();
        $sohd = $hd->insertOrder($_SESSION['makh']);
        // Lấy mã số hóa đơn vừa lấy ra lưu vào session
        $_SESSION['sohd'] = $sohd;
        // Có tổng mã số hd, tiến hành insert bằng cthoadon
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $hd -> insertOrderDetail($sohd, $item['mahh'], $item['soluong'], $item['size'], $item['dongia'], $item['total']);
            $tongtien += $item['total'];
        }
        // sau khi tổng tiền, tiến hành update ngược lại vào bảng hoadon
        $hd -> updateOrder($sohd, $tongtien);
        include "./View/order.php";
    } else {
        echo '<script>alert("Bạn chưa đăng nhập");</script>';
        include "./View/login.php";
    }
?>