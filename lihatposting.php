<?php
require("koneksi.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <div class="data" >
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Cerita</th>
                <th>Gambar/Foto</th>
            </tr>
            <?php
            $no = 1;
            $query = $pdo -> prepare("SELECT nama, cerita, gambar FROM regis INNER JOIN posting ON regis.nim = posting.nim");
            $query -> execute();
            while($data =$query -> fetch(PDO :: FETCH_ASSOC)){
            ?>
            
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['cerita'];?></td>
                <td><img src="<?php echo $data['gambar'];?>" width ="10%"></td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
        <a href="halamanutama.php">Ke Halaman Utama</a>
    </div>
</body>
</html>