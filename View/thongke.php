<section class="home-slider owl-carousel owl-loaded owl-drag">

<div class="slider-item" style="background-image: url(Content/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">

      <div class="col-md-7 col-sm-12 text-center ftco-animate fadeInUp ftco-animated">
        <h1 class="mb-3 mt-5 bread">Statistical</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Statistical</span></p>
      </div>
    </div>
  </div>
</div>
</section>
<div class="text-center">
  <h3 class="mt-5"><b>Statistical</b></h3>
</div>
<div class="row col-12 justify-content-center">
  <div>
    <a href="index.php?action=hanghoa">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lý hàng hóa</button>
    </a>
    <a href="index.php?action=category">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lý phân loại</button>
    </a>
    <a href="index.php?action=decentralization">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Phân Quyền</button>
    </a>
    <a href="index.php?action=hoadon">
      <button class="btn btn-primary mb-3" style="font-size: 16px;">Quản lí hóa đơn</button>
    </a>
  </div>
</div>

    <div class="card-body container d-flex justify-content-center align-content-center">
      <div class="w-100 h-100">
        <div>
          <form class="d-flex justify-content-center align-content-center" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
              <span>Ngày:</span>
              <br> 
              <br> 
              <span>Tháng:</span>
              <br>
              <br> 

              <span>Năm:</span>
            </div>

            <div class="mx-3">
              <input type="number" name="so_ngay" value="">
              <br>
              <br> 
              <input type="number" name="so_thang" value="">
              <br>
              <br>
              <input type="number" name="so_nam" value="">
              <br>
              <br>
              <button type="submit" name="thong_ke">Thống kê</button>
            </div>
          </form>
        </div>
        <div id="chart_div"></div>
      </div>
    </div>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {
        'packages': ['corechart']
      });
      google.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        //thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
        // B1: tạo bảng 
        var data = new google.visualization.DataTable();
        // + lấy dự liệu từ database ra để tạo dòng
        var tenhh = new Array();
        var soluongban = new Array();
        var dataten = 0;
        var slb = 0;
        var rows = new Array();

        <?php
        $hh = new hanghoa();
        $ngay = $_POST['so_ngay'];
        $thang = $_POST['so_thang'];
        $nam = $_POST['so_nam'];

        $result = $hh->getThongKeMatHang($ngay, $thang, $nam);
        while ($set = $result->fetch()) {
          $tenhh = $set['title'];
          $soluong = $set['soluong'];
          echo "tenhh.push('" . $tenhh . "');";
          echo "soluongban.push('" . $soluong . "');";
        }
        ?>

        // tạo dòng
        for (var i = 0; i < tenhh.length; i++) {
          dataten = tenhh[i];
          slb = parseInt(soluongban[i]);
          rows.push([dataten, slb]);
        }
        // tạo cột
        data.addColumn('string', 'Hàng Hóa');
        data.addColumn('number', 'Số lượng bán');
        data.addRows(rows);
        // B2: tạo option
        var options = {
          title: 'Thống kê mặt hàng đã bán',
          'width': '100%',
          'height': '100%',
          'backgroundColor': '#fff',
        };

        // B3: tiến hành vẽ khi có dữ liệu (database) và options
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    
