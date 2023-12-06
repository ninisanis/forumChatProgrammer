<?php
    session_start();
    $foto = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));
    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    $sql = "UPDATE users SET namaLengkap = '{$_POST['nama']}', username = '{$_POST['username']}', email = '{$_POST['email']}', foto = '{$foto}' WHERE id = '{$_SESSION['id']}'";
    mysqli_query($kunci, $sql);

    header("location: profile_view.php?id={$_SESSION['id']}");
?>