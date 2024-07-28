<?php require_once "./app/Views/admin/layout/Components/header.php"; ?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:1000px"></canvas>

<script>
// const xValues = [50,60,70,80,90,100,110,120,130,140,150];
const xValues = [
    <?php 
    foreach($data['statisticalSeller'] as $val) {
    echo "['" . $val['bookName'] . "'," . $val['totalOrder'] . "],";
    } ?>
];
const yValues = [7,8,8,9,9,9,10,11,14,14,15];
// const yValues = [
//     <?php 
//     foreach($data['statisticalSeller'] as $val) {
//     echo "[" . $val['quantity'] . "],";
//     } ?>
// ];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 5, max:16}}],
    //   yValues: [{ticks: {min: 5, max:16}}],
    }
  }
});
</script>

</body>
</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php"; ?>

