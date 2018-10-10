<?php
    require("koneksi.php");
    if(isset($_POST['user'])){
        $user =$_POST['user'];
        $password =$_POST['password'];
        $nim =$_POST['nim'];
        $nama = $_POST['nama'];

        $query_login =$pdo ->prepare("INSERT INTO login(user, password) VALUES ('$user','$password')");
        $query_login -> execute();

        $query = $pdo -> prepare("SELECT id FROM login WHERE user = '$user'");
        $query -> execute();
        $data = $query -> fetch(PDO::FETCH_ASSOC);
        $id = $data['id'];

        $query_regis = $pdo -> prepare("INSERT INTO regis(nim, nama, id) VALUES ('$nim','$nama','$id')");
        $query_regis -> execute();

        if($query_login && $query_regis){
            header("location:login.php");
        }
        else {
            die("Tambah Data Gagal");  
        }
    }
?>