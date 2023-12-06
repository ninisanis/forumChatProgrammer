<?php
    session_start();
    $kunci = mysqli_connect("localhost", "root", "", "rouy7122_uts_pemweb");
    $sql = "SELECT * FROM users WHERE id = '{$_SESSION['id']}'";
    $keranjang = mysqli_query($kunci, $sql);
    $row = mysqli_fetch_assoc($keranjang);
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

    <title>EDIT</title>
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
                <a style='background-color:red;' href='logout.php'>Log out </a>
            </div>
        </nav>
    </div>
    <div>
        </br></br></br></br>
        <?php
        echo "<form action='proses_editProfile.php' method='post' enctype='multipart/form-data' id='fullPage'>
            <div class='container d-flex justify-content-center'>
                <div class='mt-5' style='width: 80rem; border-style: double;' id='mainPage'>
                    <div>
                        <div class='card-header' style='text-align: center;'><h4><b>PROFILE EDIT</b></h4></div>
                        </br>
                        <div style='margin-left: 10%; margin-right: 10%;'>
                            <div class='card-body'>
                                <form action='' method='get'> 
                                    <div class='form-group'>
                                        <label class='font-weight-bold'>Full Name</label>
                                        <input type='text' class='form-control form-control-sm' name='nama' id='nama' value='{$row['namaLengkap']}' required>
                                    </div>
                                    <div class='form-group'>
                                        <label class='font-weight-bold'>Username</label>
                                        <input type='text' class='form-control form-control-sm' name='username' id='username' value='{$row['username']}' required>
                                    </div>
                                    <div class='form-group'>
                                        <label class='font-weight-bold'>Email</label>
                                        <input type='text' class='form-control form-control-sm' name='email' id='email' value='{$row['email']}' required>
                                    </div>
                                    <div class='form-group'>
                                        <label class='font-weight-bold'>Profile Picture</label>
                                        <input type='file' name='foto' accept='.png,.jpg,.gif' value='{$row['foto']}' required/>
                                    </div>
                                    <div style='text-align: center;' class='mt-5'>
                                        <button type='submit' name='proses' class='btn btn-primary btn-sm' style='width: 120px;'>EDIT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>";
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </script>
</body>
</html>