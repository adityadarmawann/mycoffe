<?php
include "koneksi.php";

$connection = new database($host, $user, $pass, $database);
$connect = new connect($connection);
$menu = new menu($connection);
$conn = $connect->connect();

if ($_GET['aksi']=="insert") {
    $tampilmenu = $menu->tampilmenu();
    $pesan = "INSERT INTO tbl_transaksi (id_transaksi, status, date) VALUES ('', 'waiting', CURRENT_TIMESTAMP)";
    mysqli_query($conn, $pesan);

    $sqlid    =mysqli_query($conn, "SELECT * FROM tbl_transaksi ORDER BY id_transaksi DESC LIMIT 1");
    $getid    =mysqli_fetch_array($sqlid);
    $id = $getid['id_transaksi'];

    while ($mnu = $tampilmenu->fetch_array()){
        $name = $mnu['id_menu'];
        $nama = str_replace(' ', '_', $mnu['nama']);
        $namaa = $_POST[$name];
        $pesan2 = "UPDATE tbl_transaksi SET $nama = '$namaa' WHERE id_transaksi = $id";
        mysqli_query($conn, $pesan2);
    }

    $antrian = "INSERT INTO antrian VALUES ('', '$_POST[nama]', '$_POST[meja]', 'waiting')";
    mysqli_query($conn, $antrian);
    $aa = mysqli_affected_rows($conn);
    
    $tampilmenu = $menu->tampilmenu();
        while ($row = $tampilmenu->fetch_array()) {
            if($row['stok'] > 0){
                $id = $row['id_menu'];
                $qty = $_POST[$id];
                $stok = "UPDATE tbl_menu SET stok = stok - $qty WHERE id_menu = '$row[id_menu]'";
                mysqli_query($conn, $stok);
            }
        }

            if($aa > 0){
                echo "<script>alert('Berhasil memesan!');
                document.location='./pesan.php';
                </script>";
            } else {
                echo "<script>alert('Gagal memesan...');
                document.location='./pesan.php';
                </script>";
            }
}

if ($_GET['aksi']=="update") {
    $no = $_GET['no'];
    $upd = "UPDATE tbl_transaksi SET status='selesai' WHERE id_transaksi=$no";
    $conn->query($upd);

    $updantri = "UPDATE antrian SET status='selesai' WHERE no_antri=$no";
    $conn->query($updantri);
    
    header("location: tampil.php");
}

?>