<?php
require("koneksi.php");
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
                <th>Nim</th>
                <th>Jenis Kelamin</th>
                <th>Fakultas</th>
                <th>Kelas</th>
                <th>Hobi</th>
                <th>Alamat</th>
                <th>Cerita</th>
                <th>Gambar/Foto</th>
            </tr>
            <?php
            $no = 1;
            $query = $pdo -> prepare("SELECT * FROM regis");
            $query -> execute();
            while($data =$query -> fetch(PDO :: FETCH_ASSOC)){
            ?>
            
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data['nim'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['jenis_kelamin'];?></td>
                <td><?php echo $data['fakultas'];?></td>
                <td><?php echo $data['kelas'];?></td>
                <td><?php echo $data['hobi'];?></td>
                <td><?php echo $data['alamat'];?></td>
                <td><?php echo $data['cerita'];?></td>
                <td><img src="<?php echo $data['gambar'];?>" width ="10%"></td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</body>
</html>