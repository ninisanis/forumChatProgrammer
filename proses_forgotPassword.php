<?php
    session_start();
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    $sql = "SELECT * FROM users WHERE username = '{$username}' AND email = '{$email}'";
    $keranjang = mysqli_query($kunci, $sql);
    $row = mysqli_fetch_assoc($keranjang);

    if(!$row)
    {
        header("location: forgotPassword.php?error=1");
    }
    else
    {
        $en_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password = '{$en_password}' WHERE username = '{$username}' AND email = '{$email}'";
        mysqli_query($kunci, $sql);
        header("location: loginPage.php");
    }
?>