<?php 
    class user {
        // hàm tạo 
        function __construct(){}
        // phương thức insert vào bảng khách hàng
        // select là query thực thi 
        // insert, update, delete,... là exec thực thi
        // phương thức thêm
        function InsertUser($tenkh, $user, $matkhau, $email, $diachi, $dt) {
            $db = new connect();
            $query = "insert into tb_user(id, full_name, username, email, address, phone_number, password, role)
            values(NULL, '$tenkh', '$user', '$email', '$diachi', '$dt', '$matkhau', default)";
            $db->exec($query);
        }
        
        // phương thức login
        function login($username, $password) {
            $db= new connect();
            $select = "select * from tb_user where username='$username' and password='$password'";
            $result = $db->getList($select);
            $set = $result->fetch();
            return $set; 
        }

        function insertComment($mahh, $makh, $noidung) {
            $db = new connect();
            $date = new DateTime('now');
            $datecreate = $date->format('Y-m-d');
            $query = "insert into tb_comments(idComment, idProd, idUser, commentDate, content)
            values(Null, $mahh, $makh, '$datecreate', '$noidung')";
            $db->exec($query);
        }
        // phương thức đếm tổng số commments
        function getCountComment($idProd) {
            $db = new connect();
            $select = "select count(idComment) from tb_comments where idProd = $idProd";
            $result = $db->getInstance($select);
            return $result[0];
        }
        // phương thức hiển thị nội dung bình luận
        function getNoiDungComment($mahh) {
            $db = new connect();
            $select = "select a.username, b.content, b.commentDate from tb_user a
            inner join tb_comments b on a.id = b.idUser where b.idProd = $mahh";
            $result = $db->getList($select);
            return $result;
        }

        function getEmail($email) {
            $db = new connect();
            $select = "select * from tb_user where email='$email'";
            $result = $db->getInstance($select);
            return $result;
        }

        function updateEmail($emailOld, $passnew) {
            $db = new connect();
            $query = "update tb_user set password = '$passnew' where email = '$emailOld'";
            $db->exec($query);
        }

        function getAllUser() {
            $db = new connect();
            $select = "select * from tb_user";
            $result = $db->getList($select);
            return $result;
        }

        function getUser($idUser) {
            $db = new connect();
            $select = "select * from tb_user where id=$idUser";
            $result = $db->getInstance($select);
            return $result;
        }

        function updateRole($idUser,$fullName,$userName,$address,$phone,$role) {
            $db=new connect();
            $query="update tb_user set full_name='$fullName', username='$userName', address='$address', phone_number=$phone, role=$role where id=$idUser";
            $db->exec($query);
        }

        function deleteUser($idUser) {
            $db=new connect();
            $query = "delete from tb_user where id=$idUser";
            $db->exec($query);
        }
    }
?>