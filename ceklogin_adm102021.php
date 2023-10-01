<?php
ob_start();
session_start();
include "koneksi.php";

    $username        = mysqli_real_escape_string($conn, $_POST['username']);
    $password        = mysqli_real_escape_string($conn, $_POST['password']);

    if(isset($_POST['login'])){
        $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE codename='$username' AND pass='$password'");
        if(mysqli_num_rows($sql)===1){
            while ($row = $sql->fetch_array()) {
                if($row['level']==0){
                    $_SESSION['codename'] = $row['codename'];
                    echo '<script language="javascript">alert("Anda berhasil Login Sebagai Admin!");</script>';
                    header("location:admin.php");
                }
            }
        }
        else{
            ?>
            <script language="JavaScript">
                alert('Oops! Login Failed. username dan password tidak sesuai ...');
                document.location='./index_admin.php';
            </script>
            <?php
        }
    }
?>