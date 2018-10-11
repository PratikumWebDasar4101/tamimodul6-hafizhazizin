<?php
    require("koneksi.php");
    session_start();
    include("header.php");
    $nim = $_SESSION['nim'];
    $sql = $pdo  -> prepare("SELECT * FROM regis WHERE nim = '$nim'");
    $sql -> execute();
    $data = $sql -> fetch(PDO::FETCH_ASSOC);
?>
<form action="form.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" maxlength="25" required value="<?php echo $data['nama'] ?>"></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><input type="text" name="nim" pattern="\d*" maxlength="10" min="0" required value="<?php echo $data['nim'] ?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>Pria<input type="radio" name="jk" <?php if($data['jenis_kelamin'] == "Pria") echo "checked"?> value="Pria">
                Wanita<input type="radio" name="jk"<?php if($data['jenis_kelamin'] == "Wanita") echo "checked"?> value="Wanita" value="<?php echo $data['jenis_kelamin'] ?>"></td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>:</td>
            <td> <select name="fakultas" value="<?php echo $data['fakultas'] ?>">
                    <option <?php if($data['fakultas'] =="FIT")echo"selected"?> value="FIT">FIT</option>
                    <option <?php if($data['fakultas'] =="FKB")echo"selected"?> value="FKB">FKB</option>
                    <option <?php if($data['fakultas'] =="FIK")echo"selected"?> value="FIK">FIK</option>
                    <option <?php if($data['fakultas'] =="FTE")echo"selected"?> value="FTE">FTE</option>
                </select></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><select name="kelas" value="<?php echo $data['kelas'] ?>">
                    <option <?php if($data['kelas'] == "D3MI-41-01" ) echo "selected" ?>value="D3M4101">D3MI-41-01</option>
                    <option <?php if($data['kelas'] == "S1SI-40-02" ) echo "selected" ?>value="S1SI4002">S1SI-40-02</option>
                    <option <?php if($data['kelas'] == "D3TK-41-03" ) echo "selected" ?>value="D3TK4103">D3TK-41-03</option>
                    <option <?php if($data['kelas'] == "D3MI-40-01" ) echo "selected" ?>value="D3MI4001">D3MI-40-01</option>
              </select></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td>:</td>
            <td>Futsal      <input type="checkbox" name="hobby[]" value="Futsal">
                Ngegame     <input type="checkbox" name="hobby[]" value="Ngegame">
                Baca Buku   <input type="checkbox" name="hobby[]" value="Baca Buku">
                Renang      <input type="checkbox" name="hobby[]" value="Renang">
                Basket      <input type="checkbox" name="hobby[]" value="Basket" value="<?php echo $data['hobi'] ?>"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" id="" cols="30" rows="10" ><?php echo $data['alamat']?></textarea ></td>
        </tr>
        <tr>
            <td><input type="submit" value="submit"></td>
            <td></td>
            <td><a href="halamanutama.php">Ke Halaman Utama</a></td>
        </tr>
    </table>
</form>
<?php
    if (isset($_POST['nim'])) {
        $nama =$_POST['nama'];
        $nim =$_POST['nim'];
        $jk =$_POST['jk'];
        $fakultas = $_POST['fakultas'];
        $kelas = $_POST['kelas'];
        $hobby = $_POST['hobby'];
        $alamat = $_POST['alamat'];
        $list_hobi =implode(", " ,$hobby);
        

        $sql= $pdo -> prepare("UPDATE regis SET nama = '$nama', jenis_kelamin='$jk',fakultas='$fakultas', kelas='$kelas', hobi='$list_hobi', alamat='$alamat' WHERE nim ='$nim'");
        $sql -> execute();
        if($sql){
            ?>
            <script>
            alert("inputan berhasil");
            location = "form.php";
        </script>
        <?php
        }
    }
?>