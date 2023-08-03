<?php
include 'fungsi.php';

if(isset($_POST['aksi'])){
    if($_POST['aksi'] == "add"){

        $berhasil = tambah_data($_POST, $_FILES);

        if($berhasil){
            header("location: index.php");
        } else {
            echo $berhasil;
        }

        //echo $nisn. " | ".$nama_siswa." | ".$jenis_kelamin." | ".$foto." | ".$alamat." | ".$quotes;

            //echo "<br>Tambah Data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            echo "Edit Data <a href='index.php'>[Home]</a>";

            $berhasil = ubah_data($_POST, $_FILES);
            
            if($berhasil){
                header("location: index.php");
            } else {
                echo $berhasil;
            }
            
        }
    }

    if(isset($_GET['hapus'])){
        
        $berhasil = hapus_data($_GET);
            
        if($berhasil){
            header("location: index.php");
        } else {
            echo $berhasil;
        }
    }
?>  