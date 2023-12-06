<?php
        $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
        session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
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
                <a href="loginPage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                <a href="registerPage.php"><span class="glyphicon glyphicon-user"></span> User</a>
            </div>
        </nav>
    </div>   
    <div class="container" id="follow">
        <div style="width: 80rem">
            <div class="card-body" id="cardTop" style="margin-left:112%; margin-bottom:-40%; margin-top:11.2%;" > 
                <div class="card" style="width: 35rem" id="followRec">
                    <div class="card-header" id="folHeader" style="text-align:center;">
                        <h3><b>Follow Recommendation</b></h3>
                    </div>
                    <div class="input-group mb-5 d-inline-flex">
                        <input type="text" class="form-control" style="margin-left:3%; margin-right:3%;margin-top:3%;" placeholder="@username" aria-label="Username" aria-describedby="basic-addon1">
                        <button style="margin-left: 278px; margin-top:10px;" class="btn btn-primary btn-sm">search</button>
                    </div>
                    <div class="card-body" id="folBody" style="font-weight: bold; margin-top:-20px;">
                        <div class="mt-2"><a href="#" style="color:black;">@rasyid13579</a></div>
                        <div class="mt-2"><a href="#" style="color:black;">@ralima_11</a></div>
                        <div class="mt-2"><a href="#" style="color:black;">@hanyainiloh</a></div>
                        <div class="mt-2"><a href="#" style="color:black;">@emte_coffee</a></div>
                    </div>

                </div>
        
         <div id="wrapper">
        
    

        <!-- Sidebar -->
        <div id="sidebar-wrapper"> <!-- Class Icon semua bahasa pemrograman diubah -->
            <ul class="sidebar-nav" style="margin-left:0;">
                <li class="sidebar-brand">
                    <a href="#menu-toggle"  id="menu-toggle" style="margin-top:20px;float:right;" > <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> 
                </li>
                <li style="margin-top:20px;">
                    <a href="dashboard.php?page=Dashboard"><i class="fa fa-home " aria-hidden="true"> </i> <span style="margin-left:10px;">Dashboard</span>  </a>
                </li>
                <li>
                    <a href="dashboard.php?page=Python"><i class="fa devicon-python-plain colored " aria-hidden="true"> </i> <span style="margin-left:10px;">Python</span>  </a>
                </li>
                <li>
                    <a href="dashboard.php?page=Javascript"> <i class="fa devicon-javascript-plain colored " aria-hidden="true"> </i> <span style="margin-left:10px;"> Javascript</span> </a>
                </li>
                <li>
                    <a href="dashboard.php?page=PHP"> <i class="fa devicon-php-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;"> PHP</span> </a>
                </li>
                <li>
                    <a href="dashboard.php?page=C"> <i class="fa devicon-c-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;"> C</span> </a>
                </li>
                <li>
                    <a href="dashboard.php?page=Ruby"><i class="fa devicon-ruby-plain colored " aria-hidden="true"> </i> <span style="margin-left:10px;"> Ruby </span> </a>
                </li>
                <li>
                    <a href="dashboard.php?page=Swift"> <i class="fa devicon-swift-plain colored" aria-hidden="true"> </i> <span style="margin-left:10px;"> Swift</span> </a>
                </li>
            </ul>
        </div>
    </div>
    </div>
    </div>
    <div>

    </div>
    <!-- /#wrapper -->
        </br></br></br></br></br></br>
        <div class="container d-flex justify-content-center" id="background" style="margin-top: 15.8%; margin-left: -50px;">
        <div class="container d-flex justify-content-center mb-5" id="follow">
                <div style="width: 80rem" id="dashMain" >
                    <div class="card-body" id="cardTop" style="margin-left:20px;">
                        <div class="card" style="width: 80rem" id="postan">
                            <div style="text-align: center; background-color: whitesmoke;">
                                <?php
                                    if(!isset($_GET['page'])) //set page
                                    {
                                        echo "<h1>Dashboard</h1>";
                                        $url = "index.php";
                                        $sqlPosts = "SELECT * FROM posts";
                                    }
                                    elseif($_GET['page'] == "C")
                                    {
                                        echo "<h1>C</h1>";
                                        $url = "index.php?page=C";
                                        $sqlPosts = "SELECT * FROM posts WHERE category = 'C'";
                                    }
                                    elseif($_GET['page'] == "Java")
                                    {
                                        echo "<h1>Java</h1>";
                                        $url = "index.php?page=Java";
                                        $sqlPosts = "SELECT * FROM posts WHERE category = 'Java'";
                                    }
                                    elseif($_GET['page'] == "Javascript")
                                    {
                                        echo "<h1>Javascript</h1>";
                                        $url = "index.php?page=Javascript";
                                        $sqlPosts = "SELECT * FROM posts WHERE category = 'Javascript'";
                                    }
                                    elseif($_GET['page'] == "PHP")
                                    {
                                        echo "<h1>PHP</h1>";
                                        $url = "index.php?page=PHP";
                                        $sqlPosts = "SELECT * FROM posts WHERE category = 'PHP'";
                                    }
                                    elseif($_GET['page'] == "Python")
                                    {
                                        echo "<h1>Python</h1>";
                                        $url = "index.php?page=Python";
                                        $sqlPosts = "SELECT * FROM posts  WHERE category = 'Python'";
                                    }
                                    elseif($_GET['page'] == "Ruby")
                                    {
                                        echo "<h1>Ruby</h1>";
                                        $url = "index.php?page=Ruby";
                                        $sqlPosts = "SELECT * FROM posts  WHERE category = 'Ruby'";
                                    }
                                    elseif($_GET['page'] == "Swift")
                                    {
                                        echo "<h1>Swift</h1>";
                                        $url = "index.php?page=Swift";
                                        $sqlPosts = "SELECT * FROM posts  WHERE category = 'Swift'";
                                    }
                                    else
                                    {
                                        echo "<h1>Dashboard</h1>";
                                        $url = "index.php";
                                        $sqlPosts = "SELECT * FROM posts";
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
                                echo "<div class='card mt-3' style='width: 80rem' id='postan'>
                                        <div>
                                            <div class='card-header'>
                                                <image src='data:image/png;base64, {$row['foto']}' width= 50px/>
                                                <p id='dashUsername' href='profile_view.php?id={$posts['posted_by']}'>@{$row['username']}</p>
                                                <h3 href='post_detail.php?id={$posts['id']}'>{$posts['judul']}</h3>
                                            </div>
                                            <div class='card-body'>
                                                <p>{$posts['description']}</p>
                                                <p>Category: {$posts['category']}</p>
                                                <p>{$posts['tags']}</p>
                                                <p>{$date}</p>
                                                <p>Comments: {$comments['Count']}</p> 
                                                <p id='time'>{$date}</p>
                                            </div>
                                        </div>
                                    </div>";
/*==================================================================================================================================================================================================== */
/*                                                      YANG BAWAH DIMASUKKIN KE CARD BODY */
/*==================================================================================================================================================================================================== */
                                if(isset($_SESSION['id'])) //allow to like if user is logged in
                                {
                                    $sqlCheckLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='post' AND liked_id='{$posts['id']}'";
                                    $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
                                    $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);
                                    if(!$checkLikes['Count'])
                                    {
                                        echo "<a href='proses_like.php?liked_id={$posts['id']}&type=post&action=like&from={$url}'><button>Like</button></a>";
                                    }
                                    else
                                    {
                                        echo "<a href='proses_like.php?liked_id={$posts['id']}&type=post&action=unlike&from={$url}'><button>Unlike</button></a>";
                                    }
                                } 
                                echo "<p>Likes: {$likes['Count']}</p></div";
                            }
                        ?>
                        <div class="card mt-3 " style="width: 80rem" id="postan">
                            <div>
                                <div class="card-header">
                                    <p id="dashUsername">username</p>
                                    <h3><b>Contoh Judul</b></h3>
                                </div>
                                <div class="card-body">
                                    <p>Ini contoh dari isi postingannya nanti ygy. Ini contoh dari isi postingannya nanti ygy. 
                                    Ini contoh dari isi postingannya nanti ygy. Ini contoh dari isi postingannya nanti ygy.</p>
                                    <p id="time">4 Okt 19.27</p>
                                </div> <!-- Tambahan comment & Like -->
                                    <button type="submit" class="glyphicon glyphicon-heart ml-5 mb-3"></button>
                                    <button type="submit" class="glyphicon glyphicon-comment ml-5 mb-3"></button>
                                </div>
                                <div class="container">
                                    <div class="card-body">
                                        <section class="comment-view ">
                                            <img src="Foto/Screenshot 2022-10-10 104324.png" style="float: left; width: 75px; border-radius: 100%;">
                                            <h4 class="comment-user">User01</h4>
                                            <article class="comment">
                                                <h5 class="comment-time">4 hours ago</h5>
                                                <p>Lorem ipsum dolor amet viral man braid tumblr street art plaid synth chambray banjo quinoa polaroid</p>
                                            </article>
                                        </section>
                                        <section class="comment-view ">
                                            <img src="Foto/Screenshot 2022-10-10 104324.png" style="float: left; width: 75px; border-radius: 100%;">
                                            <h4 class="comment-user">User02</h4>
                                            <article class="comment">
                                                <h5 class="comment-time">5 hours ago</h5>
                                                <p>Lorem ipsum dolor amet viral man braid tumblr street art plaid synth chambray banjo quinoa polaroid</p>
                                            </article>
                                        </section>
                                        <section class="comment-view ">
                                            <img src="Foto/Screenshot 2022-10-10 104324.png" style="float: left; width: 75px; border-radius: 100%;">
                                            <h4 class="comment-user">User03</h4>
                                            <article class="comment">
                                                <h5 class="comment-time">10 hours ago</h5>
                                                <p>Lorem ipsum dolor amet viral man braid tumblr street art plaid synth chambray banjo quinoa polaroid</p>
                                            </article>
                                        </section>
                                    </div>
                                    <div class="card-body">
                                        <h3>Add Comment</h3>
                                        <section class="add-comment">
                                            <img src="Foto/Screenshot 2022-10-10 104324.png" style="float: left; width: 75px; border-radius: 100%; margin-right: 10px;">
                                            <input type="text" name="komenanbaru" style="height: 50px;">
                                            <button class="btn-primary">Post</button>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
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