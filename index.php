<?php
  include 'koneksi.php';

  $query = "SELECT * FROM tb_siswa;";
  $sql = mysqli_query($conn, $query );
  $no = 0;

  $query = "SELECT jenis_kelamin, COUNT(*) AS jumlah FROM tb_siswa GROUP BY jenis_kelamin";
  $result = mysqli_query($GLOBALS['conn'], $query);

  if (!$result) {
      die("Query failed: " . mysqli_error($GLOBALS['conn']));
  }

?>

<?php


session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="datatables/datatables.js"></script>
<script sec="js/Chart.js"></script>

    <title>index</title>
</head>

        <script type="text/javascript">
          $(document).ready(function() {
            $('#dt').DataTable();
          });
        </script>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
          <i class="fa fa-book" aria-hidden="true"></i>
            Buku Tahunan
          </a>
          <table cellspacing="100" cellpadding="2">
            <tr>
              <th>Jenis kelamin</th>
            </tr>
        <?php
          $total=0;
        while ($row = mysqli_fetch_assoc($result)) {
          $total += $row["jumlah"];
            echo "<tr>";
            echo "<td>" . $row['jenis_kelamin'] . "</td>";
            echo "<td><b>" . number_format ($row['jumlah']) . "</b></td>";
            echo "</tr>";
        }
        ?>       

        <tr>
          <td>Jumlah</td>
          <td><b><?php echo number_format($total);?></b></td>
        </tr>
          <a style="position: absolute; top: 6em; right: 10em;" type="button" class="btn btn-info" href="chat.php">Diagram</a>
    </table>
  </div>
</nav>

<!-- Judul -->
<div class="container-fluid">
  <h1 class="mt-3"> Buku Tahunan</h1>
  <figure>
    <blockquote class="blockquote">
      <p>Berisi data yang sudah disimpan di database.</p>
    </blockquote>
    <figcaption class="blockquote-footer">
      Buku Tahunan <cite title="Source Title">berisi quotes para manusia absurd</cite>
    </figcaption>
  </figure>
          <a href="kelola.php" type="button" class="" style='background: rgba( 30, 144, 255, 1 ); display: block; width: 50px; height: 50px; line-height: 50px; z-index: 3; font-size: 25px; text-align: center; color: white; border-radius: 25%; -webkit-border-radius: 25%; transition: ease all 0.3s; position: fixed; right: 30px; bottom:30px;'>
              <i class="fa fa-plus"></i>
          </a>

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a type="button" class="btn btn-danger" class="nav-link active" aria-current="page" href="logout.php">
          <i class="fa fa-window-close-o" aria-hidden="true"></i>Logout</a>
        </li>
      </ul>
      <div class="table-responsive">
        <table id="dt" class="table align-middle  cell-border stripe hover">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th>NISN</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>Foto Siswa</th>
              <th>Alamat</th>
              <th>Quotes</th>
              <th>Aksi</th>
            </tr>
            </thead>
          <tbody>
            <?php
        while ($result = mysqli_fetch_assoc($sql)){
            ?>
            <tr>
              <td><center>
                <?php echo ++$no; ?>.
              </center></td>
              <td>
                <?php echo $result['nisn']; ?>
              </td>
              <td>
              <?php echo $result['nama_siswa']; ?>
              </td>
              <td>
              <?php echo $result['jenis_kelamin']; ?>
              </td>
              <td>
                <img src="img/<?php echo $result['foto_siswa']; ?>" style="width: 150px">
              </td>
              <td>
              <?php echo $result['alamat']; ?>
              </td>
              <td>
              <?php echo $result['quotes']; ?> 
              </td>
              <td>
                <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>"  type="button" class="btn btn-success btn-m">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-m" onClick="return confirm('Serius Bro Mau DI Apus???')">
                    <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <?php
        }
            ?>
            </tbody>
        </table>
        </div>
      </div>
</body>
</html>