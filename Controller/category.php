<?php 
     $act = "category";
     if(isset($_GET['act'])) {
        $act = $_GET['act'];
     }
     switch($act) {
         case 'category':
            include './View/category.php';
            break;
        case 'categoryEdit':
            include './View/editCategory.php';
            break;
        case 'themCategory':
            include './View/editCategory.php';
            break;
        case 'editCategory_action':
            if(isset($_GET['id'])) {
                $maLoai=$_GET['id'];
                $tenLoai = $_POST['tenLoai'];
                $hinh = $_FILES['image']['name'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                $loai = new loai();
                $loai->updateCategory($maLoai,$tenLoai,$hinh,$featured,$active);
                echo '<script> alert ("Cập nhật thành công") </script>';
                include './View/category.php';
            }
            break;
        case 'categoryDelete_action':
            if(isset($_GET['id'])) {
                $mahh=$_GET['id'];
                $loai = new loai();
                $loai->deleteCategory($mahh);
                echo '<script> alert ("Xóa loại hàng thành công") </script>';
                include './View/category.php';
            }
            break;
        case 'addCategory_action':
            if(isset($_POST['maLoai'])) {
                $maLoai= $_POST['maLoai'];
                $tenLoai = $_POST['tenLoai'];
                $hinh = $_FILES['image']['name'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                $loai = new loai();
                $loai->createCategory($maLoai,$tenLoai,$hinh,$featured,$active);
                echo '<script> alert ("Thêm loại hàng thành công") </script>';
                include './View/category.php';
            }
            break;
        case 'loai_action':
            if(isset($_POST['submit_file'])) {
                // b1: lấy file về 
                $file = $_FILES['file']['tmp_name'];
                // loại bỏ những kí tự đặc biệt sau khi update xEF, xBB, xBF
                file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
                // b2: mở file ra
                $file_open = fopen($file, 'r');
                // b3: tiến hành đọc nội dung của file
                while(($csv=fgetcsv($file_open, 1000, ",")) !== false) {
                    $db = new connect();
                    $id_category = $csv[0];
                    $title = $csv[1];
                    $image = $csv[2];
                    $featured = $csv[3];
                    $active = $csv[4];
                    $query = "insert into tb_category(id, title, image_name, featured, active) values ($id_category, '$title', '$image', '$featured', '$active')";
                    $db->exec($query);
                }
                echo "<script>alert('Đã thêm dữ liệu thành công')</script>";
            }

            include './View/category.php';
            break;
    }
?>