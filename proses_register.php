<?php
    $en_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $foto = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));

    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    $sql = "INSERT INTO users (username, namaLengkap, password, email, foto, role) VALUES
            ('{$_POST['username']}', '{$_POST['nama']}', '{$en_password}', '{$_POST['email']}', '{$foto}', '{$_POST['role']}')";
    mysqli_query($kunci, $sql);
    header("location: loginPage.php");
?>