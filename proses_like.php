<?php
    session_start();
    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    if($_GET['action'] == "like")
    {
        $sqlLikes = "INSERT INTO likes VALUES ({$_GET['liked_id']}, {$_SESSION['id']}, '{$_GET['type']}')";
    }
    elseif($_GET['action'] == "unlike")
    {
        $sqlLikes = "DELETE FROM likes WHERE liked_id={$_GET['liked_id']} AND liked_by={$_SESSION['id']} AND type='{$_GET['type']}'";
    }
    mysqli_query($kunci, $sqlLikes);
    header("location: {$_GET['from']}");
?>