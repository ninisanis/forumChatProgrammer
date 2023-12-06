<?php
    session_start();
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d H:i:s');
    $kunci = mysqli_connect("localhost", "rouy7122_uts_pemweb", "Dunks12%&$89", "rouy7122_uts_pemweb");
    $sql = "INSERT INTO posts (posted_by, judul, description, date, category, tags) VALUES
            ('{$_SESSION['id']}', '{$_POST['judul']}', '{$_POST['description']}', '{$date}', '{$_POST['category']}', '{$_POST['tags']}')";
    mysqli_query($kunci, $sql);
    header("location: index.php");
?>