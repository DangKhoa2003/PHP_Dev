<?php 
    class loai {
        public function __construct() {}
        // phương thức thanh toán admin
        public function getLoai() {
            $db = new connect();
            $select = "select * from tb_category";
            $result = $db->getList($select);
            return $result;
        }
        public function getCategoryId($id) {
            $db = new connect();
            $select = "select * from tb_category where id = $id";
            $result = $db->getInstance($select);
            return $result;
        }

        function updateCategory($maLoai,$tenLoai,$hinh,$featured,$active) {
            $db=new connect();
            $query="update tb_category set title='$tenLoai', image_name='$hinh', featured='$featured', active='$active' where id=$maLoai";
            $db->exec($query);
        }

        function deleteCategory($id) {
            $db=new connect();
            $query = "delete from tb_category where id=$id";
            $db->exec($query);
        }

        function createCategory($maLoai,$tenLoai,$hinh,$featured,$active) {
            $db=new connect();
            $query = "INSERT INTO `tb_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES ($maLoai, '$tenLoai', '$hinh', '$featured', '$active');";
            $db->exec($query);
        }
    }
?>