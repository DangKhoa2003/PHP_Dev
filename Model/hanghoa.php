<?php 
    class hanghoa {
        public function __construct() {}
        // phương thức thanh toán admin
        public function getHangHoaAll() {
            $db = new connect();
            $select = "select * from tb_tea";
            $result = $db->getList($select);
            return $result;
        }

        public function getAllSize() {
            $db = new connect();
            $select = "select * from tb_productsizes";
            $result = $db->getList($select);
            return $result;
        }

        public function getHangHoaId($id) {
            $db = new connect();
            $select = "select * from tb_tea where id = $id";
            $result = $db->getInstance($select);
            return $result;
        }

        function updatesp($mahh,$tenhh,$mota,$dongia,$hinh,$Nhom,$giamgia,$soluongton,$tenloai){
            $db=new connect();
            $query="update tb_tea set title='$tenhh', description='$mota', price=$dongia, image_name='$hinh', category_id=$Nhom, sales=$giamgia, inventory=$soluongton, category='$tenloai' where id=$mahh";
            $db->exec($query);
        }

        function deleteProd($id) {
            $db=new connect();
            $query = "delete from tb_tea where id=$id";
            $db->exec($query);
        }

        function createProd($mahh,$tenhh,$mota,$dongia,$hinh,$Nhom,$giamgia,$soluongton,$tenloai) {
            $db=new connect();
            $query = "INSERT INTO `tb_tea` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `sales`, `inventory`, `category`) VALUES 
            ($mahh, '$tenhh', '$mota', $dongia, '$hinh', $Nhom, $giamgia, $soluongton, '$tenloai');";
            $db->exec($query);
        }

        // phương thức thống kê số lượng hàng đã bán
        function getThongKeMatHang($ngay, $thang, $nam) {
            $db=new connect();
            $select = "SELECT c.ngaydat, b.title, sum(a.soluongmua) as soluong FROM cthoadon1 a, tb_tea b, hoadon1 c WHERE a.mahh=b.id and c.masohd=a.masohd and day(c.ngaydat) = '$ngay' and month(c.ngaydat) = '$thang' and year(c.ngaydat) = '$nam'  GROUP BY b.title, c.ngaydat";
            $result = $db->getList($select);
            return $result;
        }
    }
?>