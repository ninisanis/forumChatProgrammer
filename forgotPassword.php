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

    <title>FORGOT PASSWORD</title>
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
            <a style="width: 130px;" href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
            </div>
        </nav>
    </div>
    <div>
        </br></br></br></br>
        <form action="proses_forgotPassword.php" method="post" enctype="multipart/form-data" id="fullPage">
            <div class="container d-flex justify-content-center">
                <div class="mt-5" style="width: 80rem; border-style: double;" id="mainPage">
                    <div>
                        <div class="card-header" style="text-align: center;"><h4><b>CHANGE PASSWORD</b></h4></div>
                        </br>
                        <div style="margin-left: 10%; margin-right: 10%;">
                            <div class="card-body">
                                <form action="" method="post"  >
                                    <?php
                                        if(!isset($_GET['error']))
                                        {

                                        }
                                        elseif($_GET['error'] == 1)
                                        {
                                            echo "Username or Email is incorrect<br/>";
                                        }
                                    ?>
                                    <div class="form-group">    
                                        <label class="font-weight-bold">Username</label>
                                        <input type="text" class="form-control form-control-sm" name="username" id="username" required>
                                    </div>
                                    <div class="form-group">    
                                        <label class="font-weight-bold">Email</label>
                                        <input type="text" class="form-control form-control-sm" name="email" id="email" required>
                                    </div>
                                    <div class="form-group">    
                                        <label class="font-weight-bold">New Password</label>
                                        <input type="text" class="form-control form-control-sm" name="password" id="password" required>
                                    </div>
                                     <br />
                                    <div style="text-align: center;" class="mt-1 mb-3">
                                        <button class="btn btn-primary btn-sm" style="width: 120px;" type="submit" name="check">Confirm</button  >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </script>
</body>
</html>