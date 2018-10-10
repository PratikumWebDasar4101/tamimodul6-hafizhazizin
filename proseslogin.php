<?php
    require("koneksi.php");
    session_start();

    $user = $_POST['user'];
    $password = $_POST['password'];


    $query = $pdo -> prepare("SELECT id FROM login WHERE user = '$user' AND password = '$password'");
    $query -> execute();
    $row = $query -> rowcount();
    $data = $query -> fetch(PDO::FETCH_ASSOC);
    $id = $data['id'];

    $query_profile = $pdo -> prepare("SELECT nim FROM regis WHERE id = '$id'");
    $query_profile -> execute();
    $data_pofile = $query_profile -> fetch(PDO::FETCH_ASSOC);

    if ($row != 0) {
        $_SESSION['nim'] = $data_pofile['nim'];
        header("Location: halamanutama.php");
    }else {
        ?>
        <script>
            alert("Username atau Password salah..!");
            location = "login.php";
        </script>
        <?php
    }
?>