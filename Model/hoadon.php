<?php 
    class hoadon {
        public function __construct() {}
        // Phương thức insert vào database hóa đơn
        function insertOrder($makh) {
            $data = new DateTime('now');
            $ngay = $data->format('Y-m-d');
            $db = new connect();
            $query = "insert into hoadon1(masohd, makh, ngaydat, tongtien) 
            values(Null, $makh, '$ngay', 0)";
            $db->exec($query);
            // insert vào bảng hóa đơn xong ròi, nó ra masohd, thì lúc này lấy mã số hóa đơn vửa chèn vào ra 
            $select = "select masohd from hoadon1 order by masohd desc limit 1";
            $mahd = $db->getInstance($select);
            return $mahd[0];
        }

        // phương thức insert vào bảng cthoadon
        function insertOrderDetail($mahd, $mahh, $soluong, $size, $price, $thanhtien) {
            $db = new connect();
            $query = "insert into cthoadon1(masohd, mahh, soluongmua, name_size, gia, thanhtien, 
            tinhtrang)
            values ($mahd, $mahh, $soluong, '$size', $price, $thanhtien, 0)";
            $db->exec($query);
        }

        function updateOrder($sohd, $tongtien) {
            $db = new connect();
            $query = "update hoadon1 set tongtien=$tongtien where masohd = $sohd";
            $db -> exec($query);
        }

        // phương thức lấy thông tin từ bảng hoadon và bảng khách hàng
        function getOrder($sohd) {
            $db = new connect();
            $select = "SELECT a.masohd, b.full_name, a.ngaydat, b.phone_number, b.address from hoadon1 a
            INNER JOIN tb_user b on a.makh=b.id Where a.masohd = $sohd";
            $result = $db->getInstance($select);
            return $result;
        }
        //  phương thức lấy thông tin những hàng hóa của hóa đơn đó.
        function getOrderDetail ($sohd) {
            $db = new connect();
            $select = "SELECT b.title, a.name_size, a.soluongmua, a.gia from cthoadon1 a
            INNER JOIN tb_tea b on a.mahh=b.id Where a.masohd = $sohd";
            $result = $db->getList($select);
            return $result;
        }

        function getAllBill() {
            $db = new connect();
            $select = "select * from hoadon1";
            $result = $db->getList($select);
            return $result;
        }

        function getBill($id) {
            $db = new connect();
            $select = "select * from hoadon1 where masohd=$id";
            $result = $db->getInstance($select);
            return $result;
        }

        function updateBill($masohd,$makh,$ngaydat,$tongtien) {
            $db=new connect();
            $query="update hoadon1 set makh='$makh', ngaydat='$ngaydat', tongtien=$tongtien where masohd=$masohd";
            $db->exec($query);
        }

        function deleteBill($masohd) {
            $db=new connect();
            $query = "delete from hoadon1 where masohd=$masohd";
            $db->exec($query);
        }

        function getAllDetailsBill() {
            $db = new connect();
            $select = "select * from cthoadon1";
            $result = $db->getList($select);
            return $result;
        }

        function getDetailsBill($id) {
            $db = new connect();
            $select = "select * from cthoadon1 where masohd=$id";
            $result = $db->getInstance($select);
            return $result;
        }

        function updateDetailsBill($masohd,$mahh,$soluongmua,$nameSize, $gia, $thanhtien, $tinhtrang) {
            $db = new connect();
            $query="update cthoadon1 set mahh=$mahh, soluongmua=$soluongmua, name_size='$nameSize', gia=$gia, thanhtien=$thanhtien, tinhtrang=$tinhtrang where masohd=$masohd";
            $db->exec($query);
        }

        function deleteDetailsBill($masohd) {
            $db=new connect();
            $query = "delete from cthoadon1 where masohd=$masohd";
            $db->exec($query);
        }
    }
?>