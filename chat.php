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
    <h1 class="text-center mb-5 mt-4">Diagram Data Murid</h1>
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


    

    <div style="width: 500px; height: 500px; position: absolute; top: 8em; right: 45em;">
    <canvas id="grafik"></canvas>
  </div>
  <div style="width: 400px; height: 400px; position: absolute; top: 32em; right: 48em;">
    <canvas id="grafik2"></canvas>
  </div>
  <div style="width: 450px; height: 450px; position: absolute; top: 65em; right: 47em;">
    <canvas id="grafik3"></canvas>
  </div>
  <div style="width: 500px; height: 400px; position: absolute; top: 68em; right: 2em;">
    <canvas id="grafik4"></canvas>
  </div>
    <?php
        include 'koneksi.php';
    //Query untuk menampilkan tabel jenis kelamin
        $nama_jk= "";
        $jumlah=null;

        $sql="SELECT jenis_kelamin,COUNT(*) as 'total' FROM tb_siswa GROUP by jenis_kelamin";

    $hasil=mysqli_query($conn,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        $jk=$data['jenis_kelamin'];
        $nama_jk .= "'$jk'". ", ";

        $jum=$data['total'];
        $jumlah .= "$jum". ", ";
    }
    //Query untuk menampilkan tabel mahasiswa2

    ?>
<script>
    var ctx = document.getElementById('grafik').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [<?php echo $nama_jk; ?>],
            datasets: [{
                label:'Data Jenis Kelamin',
                backgroundColor: ['rgba(225, 0, 0, 0.5)', 'rgb( 0, 0, 252, 0.5)','rgb(255, 105, 180, 0.5)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            },
            ]
        },
    })
    var ctx = document.getElementById('grafik2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: [<?php echo $nama_jk; ?>],
            datasets: [{
                label:'Data Jenis Kelamin',
                backgroundColor: ['rgba(225, 0, 0, 0.8)', 'rgb( 0, 0, 252, 0.8)','rgb(255, 105, 180, 0.8)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            },
            ]
        },
    })
    var ctx = document.getElementById('grafik3').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'polarArea',

        // The data for our dataset
        data: {
            labels: [<?php echo $nama_jk; ?>],
            datasets: [{
                label:'Data Jenis Kelamin',
                backgroundColor: ['rgba(225, 0, 0, 0.7)', 'rgb( 0, 0, 252, 0.7)','rgb(255, 105, 180, 0.7)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            },
            ]
        },
    })
    var ctx = document.getElementById('grafik4').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
            labels: [<?php echo $nama_jk; ?>],
            datasets: [{
                label:'Data Jenis Kelamin',
                backgroundColor: ['rgba(225, 0, 0, 0.85)', 'rgb( 0, 0, 252, 0.85)','rgb(255, 105, 180, 0.85)'],
                borderColor: ['rgba(225, 0, 0)', 'rgb( 0, 0, 252)','rgb(255, 105, 180)'],
                data: [<?php echo $jumlah; ?>]
            },
            ]
        },
    })
    </script>
   
</body>
</html>