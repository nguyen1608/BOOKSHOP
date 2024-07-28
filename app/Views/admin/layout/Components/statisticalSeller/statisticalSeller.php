<?php require_once "./app/Views/admin/layout/Components/header.php"; ?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    
    <div id="myChart" style="width:100%; height:420px;">
    </div>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['bookName', 'totalOrder'],
                <?php
                foreach ($data['statisticalSeller'] as $val) {
                    echo "['" . $val['bookName'] . "'," . $val['totalOrder'] . "],";
                } ?>
            ]);

            var options = {
                title: 'Doanh Thu',
                is3D: true
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>

</body>

</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php"; ?>
