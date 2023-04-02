<?php 
    class admin {
        public function __construct() {}
        // phương thức thanh toán admin
        public function loginAdmin($user, $password) {
            $db = new connect();
            $select = "select * from tb_admin where username='$user' and password='$password'";
            $result = $db->getInstance($select);
            return $result;
        }
        function getPassword($pass) {
            $db = new connect();
            $select = "select * from tb_admin where password='$pass'";
            $result = $db->getInstance($select);
            return $result;
        }

        function updatePassword($passNew) {
            $db = new connect();
            $query = "update tb_admin set password = '$passNew'";
            $db->exec($query);
        }
    }
?>