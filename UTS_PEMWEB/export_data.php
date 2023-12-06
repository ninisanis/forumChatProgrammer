<?php
    session_start();
    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

        <title>EXTRACT</title>
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
            
                        echo "<image style='border-radius:50%; border:2px solid white; margin-right: 5px; height: 40px; margin-top:2px;' src='data:image/png;base64, {$row['foto']}' width= 40px/>";
                        echo "<a style='margin-right:5px;' href='profile_view.php?id={$row['id']}'>@{$row['username']} </a>";
                        echo "<a style='width: 130px;margin-right:5px' href='index.php'><span class='glyphicon glyphicon-home'></span> Dashboard</a>";
                    }
                ?>
            </div>
        </nav>
    <div class="container">
    </br></br></br></br></br></br>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Like</th>
                <th>Comment</th>
                <th>Posts</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sqlUsers = "SELECT * from users";
                $keranjangUsers = mysqli_query($kunci, $sqlUsers);
                while($showUser = mysqli_fetch_assoc($keranjangUsers))//show all post for selected page
                {
                    $sqlCheckLikes = "SELECT COUNT(likes) AS likes, COUNT(comments) AS comments FROM posts WHERE posted_by='{$showUser['id']}'";
                    $keranjangCheckLikes= mysqli_query($kunci, $sqlCheckLikes);
                    $checkLikes = mysqli_fetch_assoc($keranjangCheckLikes);

                    $sqlPosts = "SELECT * FROM posts WHERE posted_by='{$showUser['id']}'";
                    $keranjangPosts = mysqli_query($kunci, $sqlPosts);
                    while($posts = mysqli_fetch_assoc($keranjangPosts)) {
                        echo "
                        <tr>
                            <td>{$showUser['namaLengkap']}</td>
                            <td>@{$showUser['username']}</td>
                            <td>{$showUser['email']}</td>
                            <td>{$posts['likes']}</td>
                            <td>{$posts['comments']}</td>
                            <td>{$posts['judul']}</td>
                        </tr>";
                    }
                }
            ?>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Like</th>
                <th>Comment</th>
                <th>Posts</th>
            </tr>
        </tfoot>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
    </body>
</html>