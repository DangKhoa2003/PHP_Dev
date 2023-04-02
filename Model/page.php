<?php 
    class page {
        // Viết pt tính số trang 
        function findPage($count, $limit) {
            // 19%8= 3 khác 0 lấy floor(19/8=2+1);
            $page = (($count - $limit) == 0) ? $count/$limit:floor($count/$limit)+1;
            return $page;
        }
        // viết pt tìm start 
        // current_page là trang hiện tại vào URL=
        function findStart($limit) {
            if(!isset($_GET['page']) || $_GET['page']==1) {
                $start = 0;
                $_GET['page'] = 1;  
            } else {
                $start = ($_GET['page']-1) * $limit;
            }
            return $start;
        }
    }
?>