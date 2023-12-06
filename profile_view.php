<?php
     session_start();
     $url = "profile_view.php?id={$_GET['id']}";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>ProfileView</title>
</head>
<body>
    <div id="atas">
        <nav class="navbar navbar-dark bg-dark" id="navBar">
            <div id="judul">
                <p>ROUX</p>
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div class="navbar-nav navbar-expand-lg" id="inNavbar">
                <a style="width: 130px;margin-right:5px" href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
            </div>
        </nav>
    </div>
    <div>
        </br></br></br></br>
            <div class="container d-flex justify-content-center" >
                <div class="mt-5 mb-5" style="width: 80rem; border-style: double;" id="mainPage">
                    <div>
                        <div class="card-header" style="text-align: start;"><h4><b>PROFILE</b></h4></div>
                        </br>
                        <div style="margin-left: 10%; margin-right: 10%;">
                            <div class="card-body mb-5">
                            <div>
                                <?php
                                    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
                                    $sql = "SELECT * FROM users
                                            WHERE id = '{$_GET['id']}'";
                                    $keranjang = mysqli_query($kunci, $sql);
                                    $row = mysqli_fetch_assoc($keranjang);
                                    
                                    $sqlBan = "SELECT * FROM bans WHERE banned_user = '{$_GET['id']}'";//
                                    $keranjangBan = mysqli_query($kunci, $sqlBan);

                                    echo "<div style='margin-bottom:50px;'>";
                                        if($rowBan = mysqli_fetch_assoc($keranjangBan))//if user is banned
                                        {
                                            if($rowBan['ban_type'] == "temporary")
                                            {
                                                $date = date_format(date_create($rowBan['ban_duration']),"j M Y, H:i");
                                                echo "<h1>THIS USER HAS BEEN BANNED UNTIL {$date}!</h1>";
                                            }
                                            elseif($rowBan['ban_type'] == "permanent")
                                            {
                                                echo "<h1>THIS USER HAS BEEN PERMANENTLY BANNED!</h1>";
                                            }
                                            $banned = 1;
                                        } else
                                        {
                                            $banned = 0;
                                        }
                                    echo "</div>";
                                    if(isset($_SESSION['id']))//if admin allow delete profile
                                    {
                                        if($_SESSION['role'] == "admin")
                                        {   
                                            echo "<p><a style='position:absolute;margin-left:600px';  href='proses_delete.php?id={$_GET['id']}&type=profile&from=index.php'><button style='font-size:24px;color:white;background-color:red;font-size:15px;'>Delete</button></a></p>";
                                            if($banned)//if user is banned
                                            {
                                                echo "<p><a style='position:absolute;margin-left:599px;margin-top:30px;' href='proses_ban.php?id={$_GET['id']}&from=profile_view.php?id={$_GET['id']}&type=unban'><button style='font-size:24px;color:white;background-color:blue;font-size:15px;'>Unban</button></a></p><br/>";
                                            } else//if user is not banned
                                            {
                                                echo "<p><a style='position:absolute;margin-left:542px;margin-top:30px;' href='ban.php?type=temp&user={$row['username']}&id={$_GET['id']}&from=profile_view.php?id={$_GET['id']}'><button style='font-size:24px;color:white;background-color:blue;font-size:15px;'>Temporary Ban</button></a></p><br/><br/>";
                                                echo "<p><a style='position:absolute;margin-left:539px;margin-top:20px;' href='ban.php?type=permanent&user={$row['username']}&id={$_GET['id']}&from=profile_view.php?id={$_GET['id']}'><button style='font-size:24px;color:white;background-color:green;font-size:15px;'>Permanent Ban</button></a></p><br/>";
                                            }
                                        }
                                    }

                                     echo "<div style='padding-bottom:15px; margin-top:-40px;'>
                                                <div class='d-flex d-flex-flex-column' style='padding-top:15px;'>
                                                    <image style='border-radius:50%; border:5px solid  rgb(64, 64, 135); height:100px;' src='data:image/png;base64, {$row['foto']}' width= 100px/>
                                                    <div style='margin-top:17px;margin-left:25px; font-weight:bold;line-height:14px;'>
                                                        <a style='text-decoration:none; color:black;'><p style='margin-left:15px; margin-top:12px;font-size:20px;' id='dashUsername' >{$row['namaLengkap']}</p></a>
                                                        <a style='text-decoration:none; color:black;'><p style='margin-left:15px; margin-top:12px;font-size:20px;' id='dashUsername' >@{$row['username']}</p></a>
                                                    </div>
                                                </div>";
                                                if(isset($_SESSION['id']))//if logged in
                                                {
                                                    if($_GET['id'] == $_SESSION['id'])//if user is viewing own profile
                                                    {
                                                        echo "</br></br><a href='profile_edit.php'><button style='display: block;width: 100%;border: none;background-color: rgb(64, 64, 135);color: white;padding: 10px 25px;font-size: 16px;cursor: pointer;text-align: center;border-radius: 6px;'>
                                                        Edit Profile</button></a>";
                                                    }
                                                }
                                    echo        "<h1 class='mt-5' style='text-align:start;'>Posts</h1>";
                                    echo   "</div>";
                                ?>
                            </div>
                            <?php
                                $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
                                $sqlPosts = "SELECT * FROM posts WHERE posted_by='{$_GET['id']}'";
                                $keranjangPosts = mysqli_query($kunci, $sqlPosts);
                                    while($posts = mysqli_fetch_assoc($keranjangPosts))
                                    {
                                        $date = date_format(date_create($posts['date']),"j M Y, H:i");
                                        $sql = "SELECT * FROM users WHERE id = '{$posts['posted_by']}'";
                                        $keranjang = mysqli_query($kunci, $sql);
                                        $row = mysqli_fetch_assoc($keranjang);
                            
                                        $sqlComments = "SELECT COUNT(*) AS Count FROM comments WHERE post_id='{$posts['id']}'";
                                        $keranjangComments= mysqli_query($kunci, $sqlComments);
                                        $comments = mysqli_fetch_assoc($keranjangComments);
                            
                                        $sqlLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='post' AND liked_id='{$posts['id']}'";
                                        $keranjangLikes= mysqli_query($kunci, $sqlLikes);
                                        $likes = mysqli_fetch_assoc($keranjangLikes);
                                        echo "<div class='card-header' style='padding-bottom:15px;margin-top:10px;'>";
                                            if(isset($_SESSION['id']))//if admin allow delete profile
                                            {
                                                if($_SESSION['role'] == "admin")
                                                {   
                                                    echo "<p><a style='position:absolute;margin-left:520px;margin-top:10px;'  href='proses_delete.php?id={$posts['id']}&type=post&from={$url}'><button style='font-size:24px;color:white;background-color:red;font-size:15px;'>Delete</button></a></p>";
                                                }
                                            }
                                        echo    "<div class='d-flex d-flex-flex-column' style='padding-top:15px;'>
                                                    <image style='border-radius:50%; border:5px solid white; height:50px;' src='data:image/png;base64, {$row['foto']}' width= 50px/>
                                                    <a style='text-decoration:none; color:white;' href='profile_view.php?id={$posts['posted_by']}'><p style='margin-left:15px; margin-top:12px;font-size:20px;' id='dashUsername' >@{$row['username']}</p></a>
                                                </div>
                                                <a style='text-decoration:none; color:white;' href='post_detail.php?id={$posts['id']}'><h2>{$posts['judul']}</h2></a>
                                                <div class='body'>
                                                    <p>{$posts['description']}</p>
                                                    <p><a style='text-decoration:none;'>Category : {$posts['category']}</a></p>
                                                    <p>{$posts['tags']}</p>
                                                    <p style='margin-top:10px;'>Comments ({$comments['Count']})</br>Likes ({$likes['Count']})</p>";
                                                    if(isset($_SESSION['id']))
                                                    {
                                                        $sqlCheckLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='post' AND liked_id='{$posts['id']}' AND liked_by='{$_SESSION['id']}'";
                                                        $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
                                                        $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);
                                                        if(!$checkLikes['Count']) { //check if liked by user
                                                            echo "<p><a href='proses_like.php?liked_id={$posts['id']}&type=post&action=like&from={$url}'><i class='glyphicon glyphicon-heart' style='color:black;width:30px;margin-right:2px;font-size:25px;'>
                                                            </i></a></p>";
                                                        } else{
                                                            echo "<p><a href='proses_like.php?liked_id={$posts['id']}&type=post&action=unlike&from={$url}'><i class='glyphicon glyphicon-heart' style='color:red;width:30px;margin-right:2px;font-size:25px;'>
                                                            </i></a></p>";
                                                        }
                                                    } 
                                        echo        "<p id='time'>{$date}</p>
                                                </div>
                                            </div>";
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </script>
</body>
</html>