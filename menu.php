<?php
session_start();
ob_start();
include "koneksi.php";

	$tampiluser    =mysqli_query($conn, "SELECT * FROM tbl_user WHERE codename='$_SESSION[codename]'");
    $user    =mysqli_fetch_array($tampiluser);

    $menu = new menu($connection);
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

        .plus{
        border: none;
        position: fixed;
        right:    3%;
        bottom:   5%;
        background-color: #0275d8;
        padding: 10px 20px;
        color: rgb(255, 255, 255);
        border-radius: 50px;
        font-size: 25px;
        margin: 0 auto;
        display: block;
        transition: 0.2s ease-in-out 0s;
        font-weight: 1000;
    }

    .plus:hover{
        border: none;
        background-color: #01447e;
        color: rgb(255, 255, 255);
        cursor: pointer;
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
                            <a href="admin.php" style="text-decoration: none;">
                                    <button class="btn btn-primary text-white text-center" style="font-size:13px;">Back</button>
                            </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
    <a href="newmenu.php">
        <button class="plus">+</button>
    </a>
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Tabel Menu</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6" style="width: 100%;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                            <th>Stok</th>
                                        </tr>
                                        <?php 
                                    $tampilmenu = $menu->tampilmenu();
                                    while($row = $tampilmenu->fetch_array()){
                                        ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $row['id_menu']?></td>
                                            <td><img style="height: 100px; width: 100px;" src="img/<?= $row['img']?>" alt=""></td>
                                            <td><?= $row['nama']?></td>
                                            <td><?= $row['harga']?></td>
                                            <td><?= $row['jenis']?></td>
                                            <td>
                                                <div class="text-white text-center" style="margin: auto;">
                                                    <a href="editmenu.php?id=<?= $row['id_menu']?>" class="btn btn-xs btn-primary" style="text-decoration: none; margin:5px;">Edit</a>
                                                    <a href="action.php?aksi=hapusmenu&amp;id=<?= $row['id_menu']?>" class="btn btn-xs btn-danger" style="text-decoration: none; margin:5px;">Hapus</a>
                                                </div>    
                                            </td>
                                            <td><?= $row['stok']?></td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
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
