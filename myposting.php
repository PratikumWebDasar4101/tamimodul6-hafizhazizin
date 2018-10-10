<?php
    require("koneksi.php");
    session_start();
    $nim = $_SESSION['nim'];
?>
<html>
    <table border="1">
        <tr>
            <th>Postingan</th>
            <th>Gambar</th>
            <th>Pilihan</th>
        </tr>
        <?php
            $no = 1;
            $query = $pdo -> prepare("SELECT * FROM posting WHERE nim='$nim'" );
            $query -> execute();
            while($data =$query -> fetch(PDO :: FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $data['cerita'];?></td>
            <td><img src="<?php echo $data['gambar'];?>" width ="10%"></td>
            <td><a href="editposting.php?id=<?php echo $data['id'];?>">Edit</a></td>
        </tr>
        <?php
                $no++;
            }
            ?>
    </table>
    <a href="halamanutama.php">Ke Halaman Utama</a>
</html>