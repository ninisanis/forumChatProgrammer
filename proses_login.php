<?php
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    $keranjang = mysqli_query($kunci, $sql);
    $row = mysqli_fetch_assoc($keranjang);

    $sqlBan = "SELECT * FROM bans WHERE banned_user = '{$row['id']}'";
    $keranjangBan = mysqli_query($kunci, $sqlBan);

    if(!$row)
    {
        header("location: loginPage.php?error=1");
    }
    elseif($ban = mysqli_fetch_assoc($keranjangBan))
    {
        if($ban['ban_type'] == "temporary")
        {
            $date = date_format(date_create($ban['ban_duration']),"j M Y, H:i");
            header("location: loginPage.php?error=3&until={$date}&reason={$ban['ban_reason']}");
        }
        elseif($ban['ban_type'] == "permanent")
        {
            header("location: loginPage.php?error=4&reason={$ban['ban_reason']}");
        }
    }
    else
    {
        if(!password_verify($password, $row['password']))
        {
            header("location: loginPage.php?error=2");
        }
        else
        {
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("location: index.php");
        }
    }
?>