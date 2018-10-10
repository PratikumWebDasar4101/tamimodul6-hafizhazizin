<?php
    require("koneksi.php");
    session_start();
    $nim = $_SESSION['nim'];
    $id = $_GET['id'];
    $sql = $pdo  -> prepare("SELECT * FROM posting WHERE nim = '$nim'");
    $sql -> execute();
    $data = $sql -> fetch(PDO::FETCH_ASSOC);
?>
<html>
<form action="prosesposting.php" method="POST" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <th>Selamat Menulis</th>
        </tr>
        <tr>
            <td><textarea name="cerita" id="" cols="80" rows="20"><?php echo $data['cerita']?></textarea></td>
        </tr>
        <tr>
            <td>Upload : <input type="file" name="file" id="file" value="<?php echo $data['gambar']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
            <td><a href="halamanutama.php">Ke Halaman Utama</a></td>
        </tr>
        </table>
    </form>
</html>
<?php
    if (isset($_POST['cerita'])) {
        $cerita =$_POST['cerita'];
        $gambar =$_POST['file'];
        

        $sql= $pdo -> prepare("UPDATE posting SET cerita = '$cerita', gambar='$gambar' WHERE nim ='$nim'");
        $sql -> execute();
        if($sql){
            ?>
            <script>
            alert("inputan berhasil");
            location = "mypostingan.php";
        </script>
        <?php
        }
    }
?>