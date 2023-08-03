
<!doctype html>

<?php
session_start();
if(isset($_SESSION['username'])){
  header('location:index.php');
  exit;
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>halaman login</title>
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>

    <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <?php
            if(isset($_GET['pesan'])){
            ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Gagal!</strong> <?php echo $_GET['pesan'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
            <?php
            }
            ?>
        <div class="card">
    <div class="card-header">
        HALAMAN LOGIN
    </div>
    <form action='ceklogin.php' method='post'>
    <div class="card-body">

    <label  for="username" class="form-label">username</label>
    <div class="input-group">
        <span class="input-group-text" id="basic-addon3"><i class="fa fa-user" aria-hidden="true"></i></span>
        <input type="text" class="form-control" id="username" name="username"  required placeholder="Masukan username" aria-describedby="basic-addon3 basic-addon4">
    </div>
    <label  for="password" class="form-label">password</label>
    <div class="input-group">
        <span class="input-group-text" id="basic-addon3"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
        <input type="password" class="form-control" id="password" name="password"  required placeholder="Masukan password" aria-describedby="basic-addon3 basic-addon4">
    </div>
    <div class="row mb-3">
        <button type="submit" class="btn btn-primary mt-3" name="btnlogin">Login</button>
    </div> 
    <div class="text-center">
        Belum punya akun? silahkan <a href="daftar.php">Daftar</a>
    </div>


    </div>
    </form>
        </div>
        </div>
    </div>

    </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>