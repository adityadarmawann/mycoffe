<?php
include "koneksi.php";

$menu = new manipmenu($connection);
$user = new manipuser($connection);
$reset = new reset($connection);

    if($_GET['aksi']=="tambahmenu"){
        $id = $_GET['id'];
        if($menu->tambah($_POST) > 0 ){
            echo "<script>alert('Menu berhasil ditambah!');
            document.location='./menu.php';
            </script>";
      }else{
        echo "<script>alert('Menu gagal dihapus...');
            document.location='./menu.php';
            </script>";
      }
      }

      if($_GET['aksi']=="editmenu"){
        $id = $_GET['id'];
        if($menu->edit($_POST , $id) > 0 ){
            echo "<script>alert('Menu berhasil diubah!');
            document.location='./menu.php';
            </script>";
      }else{
        echo "<script>alert('Menu gagal diubah...');
            document.location='./menu.php';
            </script>";
      }
      }

      if($_GET['aksi']=="hapusmenu"){
        $id = $_GET['id'];
        if($menu->hapus($id) > 0 ){
            echo "<script>alert('Menu berhasil dihapus!');
            document.location='./menu.php';
            </script>";
      }else{
        echo "<script>alert('Menu gagal dihapus...');
            document.location='./menu.php';
            </script>";
      }
      }

      if($_GET['aksi']=="tambahuser"){
        $id = $_GET['id'];
        if($user->tambahusr($_POST) > 0 ){
            echo "<script>alert('User berhasil ditambah');
            document.location='./user.php';
            </script>";
      }else{
        echo "<script>alert('User gagal ditambah...');
            document.location='./user.php';
            </script>";
      }
      }

      if($_GET['aksi']=="edituser"){
        $id = $_GET['id'];
        if($user->editusr($_POST, $id) > 0 ){
            echo "<script>alert('User berhasil diubah!');
            document.location='./user.php';
            </script>";
      }else{
        echo "<script>alert('User gagal diubah...');
        document.location='./user.php';
        </script>";
      }
      }

      if($_GET['aksi']=="hapususer"){
        $id = $_GET['id'];
        if($user->hapususr($id) > 0 ){
            echo "<script>alert('User berhasil dihapus!');
            document.location='./user.php';
            </script>";
        }else{
            echo "<script> alert('User gagal dihapus...');
            document.location='./user.php';
            </script>";
        }
    }    

    if($_GET['aksi']=="reset"){
        if($reset->reset() > 0 ){
            echo "<script>alert('Berhasil mereset antrian!');
            document.location='./admin.php';
            </script>";
        }else{
            echo "<script> alert('Gagal mereset antrian...');
            document.location='./admin.php';
            </script>";
        }
    }    
?>