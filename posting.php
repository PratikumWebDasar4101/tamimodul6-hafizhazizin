<?php
    require("koneksi.php");
    session_start();
    include("header.php");
    $nim = $_SESSION['nim'];
    $sql = $pdo  -> prepare("SELECT * FROM regis WHERE nim = '$nim'");
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
            <td><textarea name="cerita" id="" cols="80" rows="20"></textarea></td>
        </tr>
        <tr>
            <td>Upload : <input type="file" name="file" id="file"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
            <td><a href="halamanutama.php">Ke Halaman Utama</a></td>
        </tr>
        </table>
    </form>
</html>