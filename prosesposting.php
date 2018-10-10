<?php
require("koneksi.php");
    session_start();
if (isset($_POST['cerita'])) {
    $cerita = $_POST['cerita'];
    $nim = $_SESSION['nim'];

    $foto = $_FILES['file']['name'];
    $tmp_foto = $_FILES['file']['tmp_name'];
    $dir = 'foto/';
    $target = $dir.$foto;

    $_SESSION['file'] = $target;
    if(!move_uploaded_file($tmp_foto, $target)){
        die("gagal upload");
    }
    header("lihatpostingan.php");

    $query =$pdo ->prepare("INSERT INTO posting(cerita, gambar, nim) VALUES ('$cerita','$target','$nim')");
    $query -> execute();
        if($query)
        header("location:lihatposting.php");
        else{
            die("Tambah Data Gagal");    
        }
}
?>