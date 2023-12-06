<?php
    session_start();
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d H:i:s');
    
    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    $sql = "INSERT INTO comments (post_id, posted_by, comment, reply_type, reply_to, date) VALUES
            ('{$_GET['post_id']}', '{$_SESSION['id']}', '{$_POST['comment']}', '{$_GET['type']}', '{$_GET['reply_to']}', '{$date}')";
    mysqli_query($kunci, $sql);
    header("location: post_detail.php?id={$_GET['post_id']}");
?>