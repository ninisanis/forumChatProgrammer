<?php
        session_start();
        $url = "post_detail.php?id={$_GET['id']}";
        $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
        $sqlPosts = "SELECT * FROM posts WHERE id={$_GET['id']}";
        $keranjangPosts = mysqli_query($kunci, $sqlPosts);
        $rowPost = mysqli_fetch_assoc($keranjangPosts);

        $sql = "SELECT * FROM users WHERE id = '{$rowPost['posted_by']}'";
        $keranjang = mysqli_query($kunci, $sql);
        $rowUser = mysqli_fetch_assoc($keranjang);
        $date = date_format(date_create($rowPost['date']),"j M Y, H:i");

        $sqlComments = "SELECT COUNT(*) AS Count FROM comments WHERE post_id='{$_GET['id']}'";
        $keranjangComments= mysqli_query($kunci, $sqlComments);
        $comments = mysqli_fetch_assoc($keranjangComments);

        $sqlCheckLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='post' AND liked_id='{$_GET['id']}'";
        $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
        $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);
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

    <title>DETAIL</title>
</head>
<body>
    <div id="atas">
        <nav class="navbar navbar-dark bg-dark" id="navBar">
            <div id="judul">
                <p>NamaWebsiteApa</p>
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div class="navbar-nav navbar-expand-lg" id="inNavbar">
                <?php
                    if(!isset($_SESSION['id'])) { //if user is not logged in
                        echo "<a style='width: 130px;'' href='index.php'><span class='glyphicon glyphicon-home'></span>  Dashboard</a>";
                    } else { //if user is logged in
                        $sql = "SELECT * FROM users
                                WHERE id = '{$_SESSION['id']}'";
                        $keranjang = mysqli_query($kunci, $sql);
                        $row = mysqli_fetch_assoc($keranjang);
            
                        echo "<image style='border-radius:50%; border:2px solid white; margin-right: 8px; height: 40px; margin-top:2px;' src='data:image/png;base64, {$row['foto']}' width= 40px/>";
                        echo "<a style='margin-right:5px;' href='profile_view.php?id={$row['id']}'>@{$row['username']} </a>";
                        echo "<a style='background-color:red;' href='logout.php'>Log out </a>";
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
                        <h3><b>Follow Recommendation</b></h3>
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
                                        echo "<h1>Detail Post</h1>";
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
                                        echo "<h1>Detail Post</h1>";
                                        $url = "index.php";
                                        $sqlPosts = "SELECT * FROM posts";
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            echo "<div class='card mt-3' style='width: 80rem;' id='postan'>
                                        <div>
                                            <div class='card-header' style='padding-bottom:15px;'>
                                                <div class='d-flex d-flex-flex-column' style='padding-top:15px;'>
                                                    <image style='border-radius:50%; border:5px solid white; height:50px;' src='data:image/png;base64, {$rowUser['foto']}' width= 50px/>
                                                    <a style='text-decoration:none; color:white;' href='profile_view.php?id={$rowPost['posted_by']}'><p style='margin-left:15px; margin-top:12px;font-size:20px;' id='dashUsername' >@{$rowUser['username']}</p></a>
                                                </div>
                                                <a style='text-decoration:none; color:white;' href='post_detail.php?id={$rowPost['id']}'><h3>{$rowPost['judul']}</h3></a>
                                            </div>
                                            <div class='card-body'>
                                                <p>{$rowPost['description']}</p>
                                                <p><a href='index.php?page={$rowPost['category']}' style='text-decoration:none;'>Category : {$rowPost['category']}</a></p>
                                                <p>{$rowPost['tags']}</p>
                                                <p style='margin-top:10px;'>Comments ({$comments['Count']})</p>
                                                <p>Likes: {$checkLikes['Count']}</p> 
                                                <p id='time'>{$date}</p>
                                            </div>
                                        </div>
                                    </div>";
                            if(isset($_SESSION['id'])) { //allow to comment if logged in
                            echo "<div class='card mt-3' style='width: 80rem;' id='postan'>
                                        <div>
                                            <div class='card-body'>
                                                <form action='proses_comment.php?post_id={$_GET['id']}&reply_to={$_GET['id']}&type=post' method='post' enctype='multipart/form-data'>
                                                <input type='text' name='comment' />
                                                <button type='submit'>Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>";
                            }

                            $sqlComments = "SELECT * FROM comments WHERE reply_type='post' AND reply_to = '{$_GET['id']}'";
                            $keranjangComments = mysqli_query($kunci, $sqlComments);
                            while($rowComments = mysqli_fetch_assoc($keranjangComments)) { //display all comments
                                $sql = "SELECT * FROM users WHERE id = '{$rowComments['posted_by']}'";
                                $keranjang = mysqli_query($kunci, $sql);
                                $rowUser = mysqli_fetch_assoc($keranjang);
                                $date = date_format(date_create($rowComments['date']),"j M Y, H:i");

                                $sqlCheckLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='comment' AND liked_id='{$rowComments['id']}'";
                                $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
                                $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);
                                echo "<div class='card mt-3' style='width: 80rem;' id='postan'>
                                            <div>
                                                <div class='card-body' style='background-color: rgb(141, 169, 144);'>";
                                                        echo"
                                                            <div class='d-flex d-flex-flex-column'>
                                                                <image style='border-radius:50%; border:2px solid black; height:30px;' src='data:image/png;base64, {$rowUser['foto']}' width= 30px/>
                                                                <a style='margin-left:5px; margin-top:5px; margin-bottom:25px;' href='profile_view.php?id={$rowComments['posted_by']}'>@{$rowUser['username']}</a>
                                                            </div>
                                                            <p>{$rowComments['comment']}</p>
                                                            <p>Likes: {$checkLikes['Count']}</p>
                                                            <p>{$date}</p>";
                                                            if(isset($_SESSION['id'])) { //if logged in{
                                                                $sqlCheckLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='comment' AND liked_id='{$rowComments['id']}'";
                                                                $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
                                                                $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);
                                                                if($_SESSION['role'] == "admin") { //if admin allow to delete reply
                                                                    echo "<p><a href='proses_delete.php?id={$rowComments['id']}&type=comment&from={$url}'><button>Delete</button></a><br/></p>";
                                                                } else if(!$checkLikes['Count']) { //check if liked by user
                                                                    echo "<p><a href='proses_like.php?liked_id={$rowComments['id']}&type=comment&action=like&from={$url}'><button>Like</button></a></p>";
                                                                } else{
                                                                    echo "<p><a href='proses_like.php?liked_id={$rowComments['id']}&type=comment&action=unlike&from={$url}'><button>Unlike</button></a></p>";
                                                                }
                                                                echo    "<form action='proses_comment.php?post_id={$_GET['id']}&reply_to={$rowComments['id']}&type=comment' method='post' enctype='multipart/form-data'>
                                                                            <input type='text' name='comment' />
                                                                            <button type='submit'>Reply</button>
                                                                        </form>";
                                                            }
                                echo            "</div>
                                            </div>
                                        </div>";

                                    $sqlReply = "SELECT * FROM comments WHERE reply_type='comment' AND reply_to = '{$rowComments['id']}'";
                                    $keranjangReply = mysqli_query($kunci, $sqlReply);
                                    while($rowReply = mysqli_fetch_assoc($keranjangReply))//display replies
                                    {
                                        $sqlCheckLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='comment' AND liked_id='{$rowReply['id']}'";
                                        $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
                                        $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);
                                        //$ReplyTo = "SELECT username FROM users WHERE id='{$rowComments['id']}'";
                            
                                        $sql = "SELECT * FROM users WHERE id = '{$rowReply['posted_by']}'";
                                        //$keranjangRepTo = mysqli_query($kunci, $ReplyTo);
                                        //$RepTo = mysqli_fetch_assoc($keranjangRepTo);
                                        $keranjang = mysqli_query($kunci, $sql);
                                        $rowUserReply = mysqli_fetch_assoc($keranjang);
                                        $date = date_format(date_create($rowReply['date']),"j M Y, H:i");

                                        echo "<div class='card mt-3' style='width: 80rem;' id='postan'>
                                                    <div>
                                                        <div class='card-body'>";
                                                                echo"
                                                                    <div class='d-flex d-flex-flex-column'>
                                                                        <image style='border-radius:50%; border:2px solid black; height:30px;' src='data:image/png;base64, {$rowUserReply['foto']}' width= 30px/>
                                                                        <a style='margin-left:5px; margin-top:5px; margin-bottom:25px;' href='profile_view.php?id={$rowUserReply['posted_by']}'>@{$rowUserReply['username']}</a>
                                                                    </div>
                                                                    <p>{$RowUser['username']}</p>
                                                                    <p>{$rowReply['comment']}</p>
                                                                    <p>Likes: {$checkLikes['Count']}</p>
                                                                    <p>{$date}</p>";
                                                                if(isset($_SESSION['id'])) //if logged in
                                                                {
                                                                    $sqlCheckLikes = "SELECT COUNT(*) AS Count FROM likes WHERE type='comment' AND liked_id={$rowReply['id']} AND liked_by={$_SESSION['id']}";
                                                                    $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
                                                                    $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);
                                                                    if($_SESSION['role'] == "admin")//if admin allow to delete reply
                                                                    {
                                                                        echo "<a href='proses_delete.php?id={$rowReply['id']}&type=reply&from={$url}'><button>Delete</button></a><br/>";
                                                                    } else if(!$checkLikes['Count'])//check if liked by user
                                                                    {
                                                                        echo "<a href='proses_like.php?liked_id={$rowReply['id']}&type=comment&action=like&from={$url}'><button>Like</button></a>";
                                                                    } else
                                                                    {
                                                                        echo "<a href='proses_like.php?liked_id={$rowReply['id']}&type=comment&action=unlike&from={$url}'><button>Unlike</button></a>";
                                                                    }
                                                                }
                                        echo            "</div>
                                                    </div>
                                                </div>";
                                    }
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