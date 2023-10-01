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
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:wght@100;200;300;400;500;700&family=Ubuntu:ital,wght@0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ef2c70460.js" cross origin="anonymous"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        body{
            margin: 0;
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
    <div class="navbar navbar-inverse set-radius-zero">
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
                            <a href="menu.php" style="text-decoration: none;">
                                    <button class="btn btn-primary text-white text-center" style="height: 40px; margin-right:160px;">Back</button>
                            </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default" style="width: 75%; margin:auto; margin-top:30px; margin-bottom:30px;">
                        <div class="panel-heading">
                           <h3>Input Menu Baru</h3>
                        </div>
                        <div class="panel-body">
                       <form action="action.php?aksi=tambahmenu" method="post" enctype="multipart/form-data" autocomplete="off" style="width:75%; margin:auto;">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" class="form-control" name="id" required/>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" required/>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" name="stok" required/>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" name="harga" required/>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Foto</label>
                                <input type="file" id="exampleInputFile" name="gambar" required/>
                            </div>

                            <div class="form-group">
                                            <label>Jenis</label>
                                            <select class="form-control" name="jenis" required>
                                                <option>makanan</option>
                                                <option>minuman</option>
                                            </select>
                            </div>
                                <button type="menu" class="btn btn-default">Submit</button>
                            </form>
                            </div>
                            </div>

    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
