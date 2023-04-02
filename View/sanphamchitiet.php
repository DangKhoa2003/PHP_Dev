<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Product Detail</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product
                            Detail</span></p>
                </div>

            </div>
        </div>
    </div>
</section>
<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $dt = new tea();
        $results = $dt -> getHangHoaId($id);
        $id = $results['id'];
        $name = $results['title'];
        $price = $results['price'];
        $image = $results['image_name'];
        $description = $results['description'];
        $category = $results['category_id'];
    }
?>
<section class="ftco-section">
    <form action="index.php?action=giohang" method="post">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="<?php echo 'Content/images/'.$image;?>" class="image-popup"><img
                        src="<?php echo 'Content/images/'.$image;?>" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                    <h3><?php echo $name?></h3>
                    <!-- Chưa truyền giá tiền vô -->
                    <p class="price"><span class="main-price">$<?php echo $price?></span></p>
                    <input type="hidden" name="price" value="" />
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would be
                        the word "and" and the Little Blind Text should turn around and return to its own, safe country.
                        But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their
                        agency, where they abused her for their.
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="size" onchange="handlePriceChange()" id="" class="form-control">
                                        <?php 
                                $results=$dt->getHangHoaSize();
                                while($set=$results->fetch()) {
                            ?>
                                        <option value="<?php echo $set['name_size']; ?>">
                                            <?php echo $set['name_size']; ?>
                                        </option>
                                        <?php 
                                }
                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn abatement-btn" data-type="minus"
                                    data-field="">
                                    <i class="icon-minus"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn increase-btn" data-type="plus"
                                    data-field="">
                                    <i class="icon-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <p>
                        <button type="submit" style="color: #fff !important;" class="btn btn-primary py-3 px-5">Add to Cart</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Related products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="row">
            <?php 
            $results= $dt->getHangNhom($category);
            while ($set=$results->fetch()) { 
        ?>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="<?php echo 'Content/images/'.$set['image_name']; ?>" class="img"
                        style="background-image: url(<?php echo 'Content/images/'.$set['image_name'];?>);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#"><?php echo $set['title']; ?></a></h3>
                        <p><?php echo $set['description']; ?></p>
                        <p class="price"><span>$<?php echo $set['price']; ?></span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <?php 
            }
        ?>
        </div>
    </div>
</section>

<?php 
    if(isset($_SESSION['makh'])):
?>
<section class="container">
    <div class="row">
        <?php 
            if(isset($_GET['id'])) {
                $mahh = $_GET['id'];
                $user = new user();
                $tong = $user->getCountComment($mahh);
            }
        ?>
        <p class="float-left text-light"><b style="font-size: 24px;">Product Reviews: <?php echo $tong?> </b></p>
        <hr>
    </div>
    <form action="index.php?action=sanpham&act=comment&id=<?php echo $_GET['id'];?>" method="post">
        <div class="row">
            <input type="hidden" name="txtmahh" value="" />
            <img src="Content/images/person_3.jpg" width="50px" height="50px" />
            <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
            <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />
        </div>
    </form>
    <div class="row">
        <p class="float-left text-light h5"><b>Các bình luận</b></p>
        <hr>
    </div>
    <div class="row">
        <?php 
            $result = $user->getNoiDungComment($mahh);
            while($set = $result->fetch()):
        ?>
        <div class="col-12">
            <div class="row">
                <img src="Content/images/person_3.jpg" width="50px" height="50px"  />
                
                <div>
                    <span> <?php echo '<b>'.$set['username'].':</b>'?> </span> <br>
                    <span> <?php echo $set['commentDate']; ?></span>
                </div>
                <span style="margin-left: 12px;"><?php echo $set['content']; ?></span>
            </div>
        </div>
        <?php 
            endwhile;
        ?>
        <br />
    </div>
</section>
<?php 
    endif;
?>
<script>
function chonsize(a) {
    document.getElementById("size").value = a;
}


const abatementBtn = document.querySelector('.abatement-btn');
const increaseBtn = document.querySelector('.increase-btn');
const inputQuantity = document.getElementById('quantity');
let mainPrice = document.querySelector('.main-price');

abatementBtn.addEventListener('click', function() {
    if(typeof inputQuantity.value == 'string') {
        let quantity = parseInt(inputQuantity.value);
        inputQuantity.value = quantity - 1;
        if(quantity < 1) {
            inputQuantity.value = 0;
        }
    }
    handlePriceChange()
})

increaseBtn.addEventListener('click', function() {
    if(typeof inputQuantity.value == 'string') {
        let quantity = parseInt(inputQuantity.value);
        inputQuantity.value = quantity + 1;
    }
    handlePriceChange()
})

var size = document.querySelector('select[name="size"]');
const priceInitial = parseFloat(mainPrice.textContent.replace('$', ''));
let inputNamePrice = document.querySelector('input[name="price"]');
inputNamePrice.value = priceInitial;
function handlePriceChange() {
    var price = parseFloat(mainPrice.textContent.replace('$', ''));
    let priceUpdate = 0;
    console.log();
    if(size.value == 'M') {
        priceUpdate = `$${priceInitial}`;
        mainPrice.innerText = priceUpdate;
        inputNamePrice.value = priceUpdate.replace('$', '');
        parseFloat(inputNamePrice.value);
    } else if(size.value == 'L') {
        priceUpdate = `$${priceInitial + 0.5}`;
        mainPrice.innerText = priceUpdate;
        inputNamePrice.value = priceUpdate.replace('$', '');
        parseFloat(inputNamePrice.value);
        price = priceInitial;
    } else if(size.value == 'XL') {
        priceUpdate  = `$${priceInitial + 1}`;
        mainPrice.innerText = priceUpdate;
        inputNamePrice.value = priceUpdate.replace('$', '');
        parseFloat(inputNamePrice.value);
        price = priceInitial;
    }
}
</script>