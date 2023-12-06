<?php
    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    if($_GET['type'] == "tempban")
    {
        $datetime = explode("T", $_POST['date']);
        $datetime[1] = $datetime[1] . ":00";
        $date = $datetime[0] . " " . $datetime[1];
        $sql = "INSERT INTO bans (banned_user, ban_duration, ban_reason, ban_type) VALUES ('{$_GET['id']}', '{$date}', '{$_POST['ban_reason']}', 'temporary')";
        mysqli_query($kunci, $sql);
    }
    elseif($_GET['type'] == "permaban")
    {
        $sql = "INSERT INTO bans (banned_user, ban_reason, ban_type) VALUES ('{$_GET['id']}', '{$_POST['ban_reason']}', 'permanent')";
        mysqli_query($kunci, $sql);
    }
    elseif($_GET['type'] == "unban")
    {
        $sql = "DELETE FROM bans WHERE banned_user = {$_GET['id']}";
        mysqli_query($kunci, $sql);
    }
    header("location: {$_GET['from']}");
?>