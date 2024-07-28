<?php require_once "./app/Views/admin/layout/Components/header.php"; ?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    <div class="d-flex align-items-center justify-content-between main-admin">
        <div class=" product">
            <h4>Sản phẩm</h4>
            <p>Số lượng: <span><?= count($data['books']) ?? 0?></span></p>
            <a href="<?= URL?>Admin/listBook">Chi tiết</a>
        </div>
        <div class=" cate">
            <h4>Danh Mục</h4>
            <p>Số lượng: <span><?= count($data['cates']) ?? 0?></span></p>
            <a href="<?= URL?>Admin/listCate">Chi tiết</a>
        </div>
        <div class=" orderManage">
            <h4>Đơn hàng</h4>
            <p>Số lượng: <span><?= count($data['orders']) ?? 0?></span></p>
            <a href="<?= URL?>Admin/listOrder">Chi tiết</a>
        </div>
    </div>
    <div id="myChart" style="width:100%; height:420px;">
    </div>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['cateName', 'sumPro'],
                <?php
                foreach ($data['statistical'] as $val) {
                    echo "['" . $val['cateName'] . "'," . $val['sumPro'] . "],";
                } ?>
            ]);

            var options = {
                title: 'Thống Kê Sản Phẩm',
                is3D: true
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>

</body>

</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php"; ?>