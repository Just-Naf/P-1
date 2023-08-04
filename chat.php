<?php
include 'koneksi.php';
?>

<?php


session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  exit;
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChartJS</title>
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <a style="position: absolute; top: 2em; left: 2em;" href="index.php" type="button" class="btn btn-danger">
    <i class="fa fa-reply" aria-hidden="true"></i></a>
    <h1 class="text-center mb-5">Diagram Data Murid</h1>
    <section>
        <div class="row">
            <div class="col">
                <canvas id="myChart" style="height:40vh; width:40vw; margin:0 auto;"></canvas>
                <canvas id="myChart2" style="height:40vh; width:40vw; margin: 100px; auto;"></canvas>
            </div>
            <div class="col">
                <table class="table table-bordered mx-auto" style="width: 400px;">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Gender</th>
                    </tr>
                    <?php
                    $no = 1;
                    $qry = $GLOBALS['conn']->query("SELECT * FROM tb_siswa");
                    while($data = $qry->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $data['nama_siswa'];?></td>
                            <td><?= $data['jenis_kelamin'];?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>


    

    <div style="width: 400px; height: 400px; position: absolute; top: 8em; right: 58em;">
    <canvas id="grafik"></canvas>
  </div>
  <div style="width: 500px; height: 250px; position: absolute; top: 38em; right: 55em;">
    <canvas id="grafik2"></canvas>
  </div>
  <div style="width: 500px; height: 400px; position: absolute; top: 68em; right: 52em;">
    <canvas id="grafik3"></canvas>
  </div>
  <div style="width: 500px; height: 400px; position: absolute; top: 68em; right: 2em;">
    <canvas id="grafik4"></canvas>
  </div>
  <script>
    var ctx =document.getElementById("grafik").getContext('2d');
    var myChart = new Chart(ctx, {
      type:'pie',
      data:{
        labels : ["gundam","laki-laki","perempuan"],
        datasets :[{
          label:'Data',
          data:[
            <?php
                  include "koneksi.php";
                  $gundam = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='gundam'");
                  echo mysqli_num_rows($gundam);
                ?>,
            <?php
                $laki = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='laki-laki'");
                echo mysqli_num_rows($laki);
              ?>,
            <?php
                $perempuan = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='perempuan'");
                echo mysqli_num_rows($perempuan);
              ?>
          ],
          backgroundColor: [
                'rgb(231, 76, 60 )',
                'rgb(12, 123, 321)',
                'rgb(165, 105, 189)'
                ],
                hoverOffset: 4
        }]
      }
    })
    </script>
  <script>
    var ctx =document.getElementById("grafik2").getContext('2d');
    var myChart = new Chart(ctx, {
      type:'bar',
      data:{
        labels : ["gundam","laki-laki","perempuan"],
        datasets :[{
          label:'Data',
          data:[
            <?php
                  include "koneksi.php";
                  $gundam = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='gundam'");
                  echo mysqli_num_rows($gundam);
                ?>,
            <?php
                $laki = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='laki-laki'");
                echo mysqli_num_rows($laki);
              ?>,
            <?php
                $perempuan = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='perempuan'");
                echo mysqli_num_rows($perempuan);
              ?>
          ],
          backgroundColor: [
                'rgb(555, 76, 60 )',
                'rgb(12, 323, 321)',
                'rgb(522, 105, 189)'
                ],
                hoverOffset: 4
        }]
      }
    })
    </script>
  <script>
    var ctx =document.getElementById("grafik3").getContext('2d');
    var myChart = new Chart(ctx, {
      type:'polarArea',
      data:{
        labels : ["gundam","laki-laki","perempuan"],
        datasets :[{
          label:'Data',
          data:[
            <?php
                  include "koneksi.php";
                  $gundam = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='gundam'");
                  echo mysqli_num_rows($gundam);
                ?>,
            <?php
                $laki = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='laki-laki'");
                echo mysqli_num_rows($laki);
              ?>,
            <?php
                $perempuan = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='perempuan'");
                echo mysqli_num_rows($perempuan);
              ?>
          ],
          backgroundColor: [
                'rgb(123, 76, 60 )',
                'rgb(333, 123, 321)',
                'rgb(130, 105, 189)'
                ],
                hoverOffset: 4
        }]
      }
    })
    </script>
  <script>
    var ctx =document.getElementById("grafik4").getContext('2d');
    var myChart = new Chart(ctx, {
      type:'doughnut',
      data:{
        labels : ["gundam","laki-laki","perempuan"],
        datasets :[{
          label:'Data',
          data:[
            <?php
                  include "koneksi.php";
                  $gundam = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='gundam'");
                  echo mysqli_num_rows($gundam);
                ?>,
            <?php
                $laki = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='laki-laki'");
                echo mysqli_num_rows($laki);
              ?>,
            <?php
                $perempuan = mysqli_query($GLOBALS['conn'],"SELECT * FROM tb_siswa WHERE jenis_kelamin='perempuan'");
                echo mysqli_num_rows($perempuan);
              ?>
          ],
          backgroundColor: [
                'rgb(231, 76, 60 )',
                'rgb(12, 123, 321)',
                'rgb(165, 105, 189)'
                ],
                hoverOffset: 4
        }]
      }
    })
    </script>
</body>
</html>