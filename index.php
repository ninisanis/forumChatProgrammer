<?php
        session_start();
        $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="path_to_css_files/all.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() 
        {
        $(".view_comments").click(function() 
        {

        var ID = $(this).attr("id");

        $.ajax({
        type: "POST",
        url: "viewajax.php",
        data: "msg_id="+ ID, 
        cache: false,
        success: function(html){
        $("#view_comments"+ID).prepend(html);
        $("#view"+ID).remove();
        $("#two_comments"+ID).remove();
        }
        });

        return false;
        });
        });
    </script>

    <title>DASHBOARD</title>
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
                <?php
                    if(!isset($_SESSION['id'])) { //if user is not logged in
                        echo "<a href='registerPage.php'><span class='glyphicon glyphicon-user'></span> Guest</a>";
                        echo "<a href='loginPage.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>";
                    } else { //if user is logged in
                        $sql = "SELECT * FROM users
                                WHERE id = '{$_SESSION['id']}'";
                        $keranjang = mysqli_query($kunci, $sql);
                        $row = mysqli_fetch_assoc($keranjang);
            
                        echo "<image style='border-radius:50%; border:2px solid white; height: 40px; margin-top:2px;' src='data:image/png;base64, {$row['foto']}' width= 40px/>";
                        echo "<a style='margin-right:10px;' href='profile_view.php?id={$row['id']}'>@{$row['username']} </a>";
                        echo "<a style='margin-left:40px;background-color:red;' href='logout.php'>Log out </a>";
                    }
                ?>
            </div>
        </nav>
    </div>
    <div class="container" id="follow">
        <div style="width: 80rem">
            <div class="card-body" id="cardTop" style="margin-left:112%; margin-bottom:-40%; margin-top:11.2%;" > 
                <div class="card" style="width: 35rem" id="followRec">
                    <div class="card-header" id="folHeader" style="text-align:center;">
                        <h3><b>Visit Recommendation</b></h3>
                    </div>
                    <div class="card-body" id="folBody" style="font-weight: bold; margin-top:10px;">
                        <?php
                            $sqlUsers = "SELECT * from users";
                            $keranjangUsers = mysqli_query($kunci, $sqlUsers);
                            $i = 0;
                            while($showUser = mysqli_fetch_assoc($keranjangUsers))//show all post for selected page
                            {
                                echo "<div class='d-flex d-flex-flex-column'>
                                            <image style='border-radius:50%; border:4px solid black; height:35px;' src='data:image/png;base64, {$showUser['foto']}' width= 35px/>
                                            <a style='text-decoration:none; color:black;' href='profile_view.php?id={$showUser['id']}'><p style='margin-left:15px; margin-top:12px;font-size:13px;' id='dashUsername' ><b>@{$showUser['username']}</b></p></a>
                                    </div>";
                                $i += 1;
                                if($i == 6) break;
                            }
                        ?>
                        <?php
                        
                            if(isset($_SESSION['id'])) {
                                if($_SESSION['role'] == "admin") {
                                    echo "<div style='margin-top:50px; font-size:20px; position:absolute;'>
                                            <a href='export_data.php'><button><span class='glyphicon glyphicon-download-alt'></span>  Extract Statistik</button></a>
                                        </div>";
                                }
                            }
                        ?>
                    </div>

                </div>
    
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-left:0;">
                <li class="sidebar-brand">
                    <a href="#menu-toggle"  id="menu-toggle" style="margin-top:20px;float:right;" > <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> 
                </li>
                <li style="margin-top:20px;">
                    <a href="index.php?page=Dashboard"><i class="fa fa-home" aria-hidden="true"> </i> <span style="margin-left:10px;">Dashboard</span>  </a>
                </li>
                <li>
                    <a href="index.php?page=Python"><i class="fa devicon-python-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;">Python</span>  </a>
                </li>
                <li>
                    <a href="index.php?page=Javascript"> <i class="fa devicon-javascript-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;"> Javascript</span> </a>
                </li>
                <li>
                    <a href="index.php?page=PHP"> <i class="fa devicon-php-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;"> PHP</span> </a>
                </li>
                <li>
                    <a href="index.php?page=C"> <i class="fa devicon-c-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;"> C</span> </a>
                </li>
                <li>
                    <a href="index.php?page=Ruby"><i class="fa devicon-ruby-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;"> Ruby </span> </a>
                </li>
                <li>
                    <a href="index.php?page=Swift"> <i class="fa devicon-swift-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;"> Swift</span> </a>
                </li>
            </ul>
        </div>
    </div>
    </div>
    </div>
    <div>

    </div>
    <!-- /#wrapper -->

    <div style="position: fixed; margin-left:1130px; margin-top:750px;" >
        <?php
        if(isset($_SESSION['id'])) { //if user is not logged in
            echo "<a id='postBut' href='post.php' alt='post'><image style='width:120px; height:120px;' src='https://cdn-icons-png.flaticon.com/512/1828/1828817.png' /></span></a>";
        }?>
    </div>

        </br></br></br></br></br></br>
        <div class="container d-flex justify-content-center" id="background" style="margin-top: 15.8%; margin-left: -50px;">
        <div class="container d-flex justify-content-center mb-5" id="follow">
                <div style="width: 80rem" id="dashMain" >
                    <div class="card-body" id="cardTop" style="margin-left:20px;">
                        <div class="card" style="width: 80rem" id="postan">
                            <div style="text-align: center; background-color: #333; color: white;padding-bottom:8px;">
                                <?php
                                    if(!isset($_GET['page'])) //set page
                                    {
                                        echo "<h1>Dashboard</h1>";
                                        $url = "index.php";
                                        $sqlPosts = "SELECT * FROM posts ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                    elseif($_GET['page'] == "C")
                                    {
                                        echo "<h1>C</h1>";
                                        $url = "index.php?page=C";
                                        $sqlPosts = "SELECT * FROM posts WHERE category = 'C' ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                    elseif($_GET['page'] == "Java")
                                    {
                                        echo "<h1>Java</h1>";
                                        $url = "index.php?page=Java";
                                        $sqlPosts = "SELECT * FROM posts WHERE category = 'Java' ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                    elseif($_GET['page'] == "Javascript")
                                    {
                                        echo "<h1>Javascript</h1>";
                                        $url = "index.php?page=Javascript";
                                        $sqlPosts = "SELECT * FROM posts WHERE category = 'Javascript' ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                    elseif($_GET['page'] == "PHP")
                                    {
                                        echo "<h1>PHP</h1>";
                                        $url = "index.php?page=PHP";
                                        $sqlPosts = "SELECT * FROM posts WHERE category = 'PHP' ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                    elseif($_GET['page'] == "Python")
                                    {
                                        echo "<h1>Python</h1>";
                                        $url = "index.php?page=Python";
                                        $sqlPosts = "SELECT * FROM posts  WHERE category = 'Python' ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                    elseif($_GET['page'] == "Ruby")
                                    {
                                        echo "<h1>Ruby</h1>";
                                        $url = "index.php?page=Ruby";
                                        $sqlPosts = "SELECT * FROM posts  WHERE category = 'Ruby' ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                    elseif($_GET['page'] == "Swift")
                                    {
                                        echo "<h1>Swift</h1>";
                                        $url = "index.php?page=Swift";
                                        $sqlPosts = "SELECT * FROM posts  WHERE category = 'Swift' ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                    else
                                    {
                                        echo "<h1>Dashboard</h1>";
                                        $url = "index.php";
                                        $sqlPosts = "SELECT * FROM posts ORDER BY ((likes * 0.3) + (comments * 0.7)) DESC";
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            $keranjangPosts = mysqli_query($kunci, $sqlPosts);
                            while($posts = mysqli_fetch_assoc($keranjangPosts))//show all post for selected page
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
                                echo "<div class='card mt-3' style='width: 80rem;' id='postan'>
                                        <div>
                                            <div class='card-header' style='padding-top:15px;'>";
                                                if(isset($_SESSION['id']))
                                                {
                                                    if($_SESSION['role'] == "admin")
                                                    {
                                                        echo "<a style='margin-left:710px;' href='proses_delete.php?id={$posts['id']}&type=post&from={$url}'><button style='font-size:24px;color:white;background-color:red;font-size:15px;'>delete</button></a><br/>";
                                                    }
                                                }
                                echo            "<div class='d-flex d-flex-flex-column'>
                                                    <image style='border-radius:50%; border:5px solid white; height:50px;' src='data:image/png;base64, {$row['foto']}' width= 50px/>
                                                    <a style='text-decoration:none; color:white;' href='profile_view.php?id={$posts['posted_by']}'><p style='margin-left:15px; margin-top:12px;font-size:20px;' id='dashUsername' >@{$row['username']}</p></a>
                                                </div>
                                                <a style='text-decoration:none; color:white;' href='post_detail.php?id={$posts['id']}'><h3>{$posts['judul']}</h3></a>
                                            </div>
                                            <div class='card-body'>
                                                <p>{$posts['description']}</p>
                                                <p>Category: {$posts['category']}</p>
                                                <p>{$posts['tags']}</p>
                                                <a style='margin-bottom:25px;text-decoration:none;color:black;margin-right:10px;' href='post_detail.php?id={$posts['id']}'>";
                                echo            "<div style='margin-top:7px;'><i class='glyphicon glyphicon-comment' style='color:black;width:30px;margin-right:2px;font-size:25px;'></i> {$comments['Count']}</a>"; 
                                                if(isset($_SESSION['id'])) { //allow to like if user is logged in
                                                    $sqlCheckLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='post' AND liked_id='{$posts['id']}' AND liked_by='{$_SESSION['id']}'";
                                                    $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
                                                    $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);
                                                    if(!$checkLikes['Count']) {
                                                        echo "<a style='text-decoration:none;color:black;margin-right:10px;' href='proses_like.php?liked_id={$posts['id']}&type=post&action=like&from={$url}'><i class='glyphicon glyphicon-heart' style='color:black;width:30px;margin-right:2px;font-size:25px;'>
                                                        </i>{$likes['Count']}</a>";
                                                    } else {
                                                        echo "<a style='text-decoration:none;color:black;margin-right:10px;' href='proses_like.php?liked_id={$posts['id']}&type=post&action=unlike&from={$url}'><i class='glyphicon glyphicon-heart' style='color:red;width:30px;margin-right:px;font-size:25px;'>
                                                        </i>{$likes['Count']}</a>";
                                                    }
                                                }
                                                $sqlUpdate = "UPDATE posts SET likes = '{$likes['Count']}', comments = '{$comments['Count']}' WHERE id = {$posts['id']}";
                                                mysqli_query($kunci, $sqlUpdate);
                                echo            "</div><p id='time'>{$date}</p>
                                            </div>
                                        </div>
                                    </div>";
/*==================================================================================================================================================================================================== */
/*                                                                          YANG BAWAH DIMASUKKIN KE CARD BODY */
/*==================================================================================================================================================================================================== */

                            }
                        ?>
                    </div>
                </div>
            </div>
    </div>
<?php
/* =================================================================================================================================================================================================== */
/*                                                                              DIBAWAH UNTUK TOMBOL POST */
/* =================================================================================================================================================================================================== */
?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>