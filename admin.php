<?php
session_start();
ob_start();
include "koneksi.php";

	$tampiluser    =mysqli_query($conn, "SELECT * FROM tbl_user WHERE codename='$_SESSION[codename]'");
    $user    =mysqli_fetch_array($tampiluser);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin My Coffe</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:wght@100;200;300;400;500;700&family=Ubuntu:ital,wght@0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ef2c70460.js" cross origin="anonymous"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        body{
            margin: 0;
            background-color: #FFF8EA;
        }
    </style>
</head>
<body>
    <div class="navbar set-radius-zero" style="background-color: #967E76;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">
                        <h2 style="color:white;">Selamat Datang, <?= $user['username'];?></h2>
                            <a href="logout_adm102021.php" style="text-decoration: none;">
                                <button class="btn btn-danger text-white text-center" style="font-size:13px;">Logout <i class="fa-solid fa-right-from-bracket"></i></button>
                            </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Manipulasi Data</h4>
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-evenly">
            <a href="menu.php">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="fa fa-edit dashboard-div-icon" ></i>
                        <h5>Menu</h5>
                    </div>
                </div>
            </a>
            <a href="user.php">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-user dashboard-div-icon" ></i>
                        <h5>User</h5>
                    </div>
                </div>
            </a>
            <a href="" data-toggle="modal" data-target="#myModal">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-trash dashboard-div-icon" ></i>
                        <h5>Reset Antrian</h5>
                    </div>
                </div>
            </a>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">RESET ANTRIAN</h4>
                                        </div>
                                        <div class="modal-body">
                                           Apakah anda yakin akan mereset antrian?
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                                <a href="action.php?aksi=reset"><button type="button" class="btn btn-primary">Iya</button></a>
                                            </div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
