<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>


<div style="width: 400px; height: 400px; position: absolute; top: 38em; left: 48em;">
    <canvas id="grafik"></canvas>
  </div>
  <div style="width: 500px; height: 250px; position: absolute; top: 18em; left: 45em;">
    <canvas id="grafik2"></canvas>
  </div>
  <script>
    var ctx =document.getElementById("grafik").getContext('2d');
    var myChart = new Chart(ctx, {
      type:'doughnut',
      data:{
        labels : ["laki-laki","perempuan","gundam"],
        datasets :[{
          label:'Data',
          data:[
            <?php
                include "koneksi.php";
                $laki = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='laki-laki'");
                echo mysqli_num_rows($laki);
              ?>,
            <?php
                $gundam = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='gundam'");
                echo mysqli_num_rows($gundam);
              ?>,
            <?php
                $perempuan = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='perempuan'");
                echo mysqli_num_rows($perempuan);
              ?>
          ],
          backgroundColor: [
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 99, 132, 0.2)'
          ],
          borderColor:[
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)'
          ],
          borderWidth:1
        }]
      }
    })
    </script>
  <script>
    var ctx =document.getElementById("grafik2").getContext('2d');
    var myChart = new Chart(ctx, {
      type:'bar',
      data:{
        labels : ["laki-laki","perempuan","gundam"],
        datasets :[{
          label:'Data',
          data:[
            <?php
                include "koneksi.php";
                $laki = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='laki-laki'");
                echo mysqli_num_rows($laki);
              ?>,
            <?php
                $gundam = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='gundam'");
                echo mysqli_num_rows($gundam);
              ?>,
            <?php
                $perempuan = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='perempuan'");
                echo mysqli_num_rows($perempuan);
              ?>
          ],
          backgroundColor: [
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 99, 132, 0.2)'
          ],
          borderColor:[
            'rgba(54, 162, 235, 1)',
            'rgba(255, 99, 132, 1)'
          ],
          borderWidth:1
        }]
      }
    })
    </script>
</body>
</html>