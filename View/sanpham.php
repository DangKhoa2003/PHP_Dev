<?php
// B1: Tìm tổng số record (số sản phẩm trong database hàng hóa)
$hh = new tea();
// count = $hh -> getCountRecode();
$result = $hh->getHangHoa();
$count = $result->rowCount();
// b2: cho limit tự cho dựa vào thiết kế
$limit = 8;
// b3: tính ra số trang và start 
$p = new page();
// lấy ra tổng số trang 
$page = $p->findPage($count, $limit);
// Lấy ra $start 
$start = $p->findStart($limit);
// B3: thiết lập trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<?php
if (isset($_GET["act"]) == 'khuyenmai') {
	$act = 0;
}
if (isset($_GET["act"]) == 'timkiem') {
	$act = 2;
} else {
	$act = 1;
}
?>
<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Shop Online</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-menu mb-5 pb-5">
	<?php 
		$user = new user();
		if(isset($_SESSION['makh'])) {
			$idUser = $_SESSION['makh'];
			$result = $user->getUser($idUser);
			if($result['role'] === 1) {
				echo '
					<div class="container">
					<div class="row col-12 justify-content-center">
						<div>
							<a href="index.php?action=hanghoa">
								<button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lý hàng hóa</button>
							</a>
							<a href="index.php?action=category">
								<button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lý phân loại</button>
							</a>
							<a href="index.php?action=thongke">
								<button class="btn btn-primary mb-3" style="font-size: 16px;">Thống kê hàng hóa</button>
							</a>
						</div>
						</div>
					</div>
				';
			}
		}
	?>
	<div class="container">
		<div class="row d-md-flex">
			<div class="col-lg-12 ftco-animate p-md-5">
				<div class="row">
					<div class="w-100 text-center">
						<div class="d-flex justify-content-around">

							<?php
							if ($act == 2) {
								echo '<h2>Sản phẩm tìm kiếm</h2>';
							} else {
								echo '<h2>Product Shop</h2>';
							}
							?>
							<form class="" action="index.php?action=sanpham&act=timkiem" method="post">
								<div class="input-group">
									<div class="input-group-prepend d-flex">
										<input type="text" style="padding: 10px 12px" name="txtsearch" class="form-control" placeholder="Enter name product..." />
										<input class="input-group-text mt-2" style="height: 35px; background: #f8b500; border-radius: 12px; border: none" type="submit" id="btsearch" value="Search" />
									</div>
							</form>
						</div>
					</div>
					<div class="col-md-12 d-flex align-items-center mt-5">

						<div class="tab-content ftco-animate" id="v-pills-tabContent">

							<div class="tab-pane fade show active" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">
								<div class="row">
									<?php
									$products = new tea();
									if ($act == 1) {
										$result = $products->getDessertsNew();
									}
									if ($act == 2) {
										if (isset($_POST['txtsearch'])) {
											$tk = $_POST['txtsearch'];
											// việc tìm kiếm model làm 
											$result = $products->getTimKiem($tk);
										}
									} else {
										$result = $products->getListProductsAllPage($start, $limit);
									}
									while ($set = $result->fetch()) {
									?>
										<div class="col-md-3">
											<div class="menu-entry">
												<a href="Content/images/<?php echo $set['image_name']; ?>" class="img" style="background-image: url(Content/images/<?php echo $set['image_name']; ?>);"></a>
												<div class="text text-center pt-4">
													<h3><a href="product-single.html"><?php echo $set['title']; ?></a></h3>
													<p><?php echo $set['description']; ?></p>
													<p class="price"><span>$<?php echo $set['price']; ?></span></p>
													<a href="index.php?action=sanpham&act=detail&id=<?php echo $set['id']; ?>">
														<button class="detailsBtn">
															<div class="default-btn">
																<svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
																	<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
																	<circle r="3" cy="12" cx="12"></circle>
																</svg>
																<span>View Details</span>
															</div>
															<div class="hover-btn">
																<svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
																	<circle r="1" cy="21" cx="9"></circle>
																	<circle r="1" cy="21" cx="20"></circle>
																	<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
																</svg>
																<span>Let's go!</span>
															</div>
														</button>
													</a>
												</div>
											</div>
										</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-12 d-flex justify-content-center align-content-center col-md-offset-3">
				<ul class="pagination">
					<?php
					// nút lùi
					if ($current_page > 1 && $page > 1) {
						echo '
							<button style="border-radius: 14px; padding: 6px 12px; font-size: 16px; margin: 0px 4px;">
								<li><a style="color: #f8b500;" href="index.php?action=sanpham&page=' . ($current_page - 1) . '">Prev</a></li>
							</button>
							';
					}
					for ($i = 1; $i <= $page; $i++) {
					?>
						<button style="border-radius: 14px; padding: 6px 12px; font-size: 16px; margin: 0px 4px;">
							<li><a style="color: #f8b500;" href="index.php?action=sanpham&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						</button>
					<?php
					}
					// nút tiến
					if ($current_page < $page && $page > 1) {
						echo '
							<button style="border-radius: 14px; padding: 6px 12px; font-size: 16px; margin: 0px 4px;">
								<li><a style="color: #f8b500;" href="index.php?action=sanpham&page=' . ($current_page + 1) . '">Next</a></li>
							</button>	
							';
					}
					?>
				</ul>
			</div>
		</div>
</section>