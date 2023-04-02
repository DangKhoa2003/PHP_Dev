<?php 
    if(isset($_SESSION['cart'])) {
        $j=0;
        foreach($_SESSION['cart'] as $key=> $item):
            $j++;
        endforeach;
        $j = count($_SESSION['cart']);
    } else {
        $j = 0;
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="index.php?action=blog" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="index.php?action=about" class="nav-link">About</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=sanpham">Shop</a>
                </li>
                <li class="nav-item"><a href="index.php?action=contact" class="nav-link">Contact</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Account</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <?php 
                            if(isset($_SESSION['makh']) && isset($_SESSION['tenkh']) || isset($_SESSION['admin'])):
                        ?>
                        <a class="dropdown-item" href="index.php?action=dangnhap&act=logout">Đăng xuất</a>
                        <?php 
                            else:
                            echo '
                                <a class="dropdown-item" href="index.php?action=dangky">Đăng kí</a>
                                <a class="dropdown-item" href="index.php?action=dangnhap">Đăng nhập</a>
                                <a class="dropdown-item" href="index.php?action=dangnhapAdmin">Đăng nhập Admin</a>
                            '
                        ?>
                        <?php
                            endif;
                        ?>
                    </div>
                </li>
                <li>
                    <?php
                        if(isset($_SESSION['makh']) && isset($_SESSION['tenkh'])):
                            $name=$_SESSION['tenkh']; 
                    ?>
                        <p style="color: #fff; margin-top: 20px; margin-left: 0px;"><?php echo "Hello! ".$name ;?></p>
                    
                    <?php
                        else:
                        echo '<p style="color: #fff; margin-top: 20px; margin-left: 0px;">'."Hello!".'</p>';
                    ?>
                    <?php
                        endif;
                    ?>
                </li>
                <li class="nav-item cart">
                    <a href="index.php?action=giohang" class="nav-link"><span
                        class="icon icon-shopping_cart"></span><span
                        class="bag d-flex justify-content-center align-items-center"><small><?php echo $j;?></small></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->