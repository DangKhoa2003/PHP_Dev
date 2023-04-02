<?php 
    class tea{
        //thuộc tính
        // hàm tạo
        function __construct(){

        }
        // Lấy dữ liệu từ database về để  View lấy nó và hiện thị lên
        // pt lấy ra 12 sản phẩm mới nhất

        function getHangHoa(){
            //b1: kết nối với database
            $db =  new connect();
            $select = "select *  from tb_tea";
            $result =$db -> getList($select);
            return $result;
        }

        function getHangHoaId($id){
            //b1: kết nối với database
            $db =  new connect();
            $select = "select *  from tb_tea where id=$id";
            $result =$db ->getInstance($select);
            return $result;
        }
        
        function getCoffee() {
            //b1: kết nối với database
            $db =  new connect();
            $select = "select *  from tb_tea where category_id=1";
            $result =$db -> getList($select);
            return $result;
        }

        function getDishNew() {
             //b1: kết nối với database
             $db =  new connect();
             $select = "select * from tb_tea ORDER BY category_id=2 desc LIMIT 6";
             $result =$db -> getList($select);
             return $result;
        }

        function getDrinkNew() {
            $db =  new connect();
             $select = "select * from tb_tea ORDER BY category_id=3 desc LIMIT 6";
             $result =$db -> getList($select);
             return $result;
        }

        function getDessertsNew() {
            $db =  new connect();
             $select = "select * from tb_tea ORDER BY category_id=4 desc LIMIT 6";
             $result =$db -> getList($select);
             return $result;
        }

        function getThreeDish() {
            //b1: kết nối với database
            $db =  new connect();
            $select = "select * from tb_tea ORDER BY category_id=2 desc LIMIT 3";
            $result =$db -> getList($select);
            return $result;
        }

        function getThreeDrinks() {
            //b1: kết nối với database
            $db =  new connect();
            $select = "select * from tb_tea ORDER BY category_id=3 desc LIMIT 3";
            $result =$db -> getList($select);
            return $result;
        }

        function getThreeDesserts() {
            //b1: kết nối với database
            $db =  new connect();
            $select = "select * from tb_tea ORDER BY category_id=4 desc LIMIT 3";
            $result =$db -> getList($select);
            return $result;
        }

        function getHangHoaNhom($id){
            //b1: kết nối với database
            $db =  new connect();
            $select = "select *  from tb_tea where id=$id";
            $result =$db ->getInstance($select);
            return $result;
        }

        function getHangNhom($category_id) {
            //b1: kết nối với database
            $db =  new connect();
            $select = "SELECT * FROM `tb_tea` WHERE category_id=$category_id";
            $result =$db ->getList($select);
            return $result;
        }

        function getHangHoaSize() {
            //b1: kết nối với database
            $db =  new connect();
            $select = "SELECT DISTINCT name_size FROM `tb_productsizes`";
            $result =$db->getList($select);
            return $result;
        }

        function getCategory() {
            $db =  new connect();
            $select = "select *  from tb_category";
            $result =$db->getList($select);
            return $result;
        }
        function getListProductsAllPage($start, $limit) {
            $db = new connect();
            $select = "SELECT * FROM tb_tea limit ".$start.",".$limit;
            $results = $db -> getList($select);
            return $results;
        }
        // phương thức tìm kiếm
        public function getTimKiem($timkiem) {
            $db = new connect();
            $select = "select * from tb_tea WHERE title like '%$timkiem%' ";
            $result = $db->getList($select);
            return $result;
        }
    }
?>