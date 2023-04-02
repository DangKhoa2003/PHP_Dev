<?php

use function PHPSTORM_META\type;

    class giohang {
        function add_item($key, $quantity, $price, $size) {
            $prod = new tea();
            $pros = $prod->getHangHoaId($key);
            $hinh=$pros["image_name"];
            $mota=$pros["description"];
            $ten=$pros["title"];
            $total= $quantity*$price;
            // Tạo 1 đối tượng , kiểu array
            $item=array(
                'mahh'=> $key,
                'hinh'=>$hinh,
                'mota'=>$mota,
                'name'=>$ten,
                'size'=> $size,
                'soluong'=>$quantity,
                'dongia'=>$price,
                'total'=>$total,
            );
            $i = 0;
            $fg = 0;
            // đưa đối tượng vào trong session ('cart);
            if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
                foreach($_SESSION['cart'] as $sp) {
                    if($sp['mahh'] == $item['mahh'] && $sp['size'] == $item['size']) {
                        $quantity += $sp['soluong'];
                        $fg = 1;
                        $_SESSION['cart'][$i]['soluong'] = $quantity;
                        break;
                    }
                    $i++;
                }
            }
            if($fg == 0) {
                $_SESSION['cart'][] = $item;
            }
        }

        function getTotal() {
            $subtotal = 0;
            foreach($_SESSION['cart'] as $item) {
                $subtotal += $item['total'];
            }
            return number_format($subtotal, 2);
        }

        function delete_items($key) {
            unset($_SESSION['cart'][$key]);
        }

        function update_items($key, $quantity) {
            if($quantity <= 0) {
                $this->delete_items($key);
            } else {
                $_SESSION['cart'][$key]['soluong'] = $quantity;
                $total_new = $_SESSION['cart'][$key]['soluong']*$_SESSION['cart'][$key]['dongia'];
                $_SESSION['cart'][$key]['total'] = $total_new;
            }
        }
    }
?>