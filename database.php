<?php
function upload(){
        
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if( $error === 4){
      echo "<script>
              alert('Tolong upload gambar!');
      </script>";
      return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>
        alert('File yang diupload bukan gambar!');
              </script>";
    return false;
  }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000) {
    echo "<script>
            alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

class database{
    private $host;
    private $user;
    private $pass;
    private $database;
    public $conn;

    function __construct($host, $user, $pass, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database) or die ("could not connect to mysql");
        if(!$this->conn){
            return false;
        } else {
            return true;
        }
    }
}

class connect{
    private $mysqli;

    function __construct($conn){
        $this->mysqli = $conn;
    }

    public function connect(){
        $db = $this->mysqli->conn;
        return $db;
    }
}

class menu{
    private $mysqli;

    function __construct($conn) {
        $this->mysqli = $conn;
    }
        public function tampilmkn() {
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM tbl_menu WHERE jenis = 'makanan' AND stok > 0";
            $query = $db->query($sql);
            return $query;
        }

        public function tampilmnm() {
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM tbl_menu WHERE jenis = 'minuman' AND stok > 0";
            $query = $db->query($sql);
            return $query;
        }

        public function tampilmenu(){
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM tbl_menu";
            $query = $db->query($sql);
            return $query;
        }

        public function transaksi(){
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM tbl_transaksi";
            $query = $db->query($sql);
            return $query;
        }

        public function selesai(){
            $db = $this->mysqli->conn;
            $sel = "SELECT * FROM tbl_transaksi WHERE status='waiting'";
	        $data = $db->query($sel);
            return $data;
        }

        public function antrian(){
            $db = $this->mysqli->conn;
            $sel = "SELECT * FROM antrian LIMIT 5";
	        $data = $db->query($sel);
            return $data;
        }
}

class manipulasi{
    public $mysqli;
    public $data;
    public $query;

    function __construct($conn) {
        $this->mysqli = $conn;
    }
}

class manipmenu extends manipulasi{
    public $mysqli;
    public $query;

    public function tambah($data){
        $db = $this->mysqli->conn;

        $id = htmlspecialchars($data['id']);
        $nama = htmlspecialchars($data['nama']);
        $stok = htmlspecialchars($data['stok']);
        $harga = htmlspecialchars($data['harga']);
        $jenis = htmlspecialchars($data['jenis']);

        $name = str_replace(' ', '_', $nama);

        $img = upload();
        if( !$img){
            return false;
        }

        $inputmenu = "INSERT INTO tbl_menu VALUES
            ('$id','$nama','$stok','$harga','$img','$jenis')";
            $query = $db->query($inputmenu);

        $addtransaksi = "ALTER TABLE tbl_transaksi ADD COLUMN $name INT(11) NOT NULL";
        $db->query($addtransaksi);

        return $query;
    }

    public function edit($data, $id){
        $db = $this->mysqli->conn;

       $getoldname = mysqli_query($db, "SELECT * FROM tbl_menu WHERE id_menu = '$id'");
       $qry    =mysqli_fetch_array($getoldname);
       $oldname = $qry['nama'];
       $name = str_replace(' ', '_', $oldname);

        $id = htmlspecialchars($data['id']);
        $nama = htmlspecialchars($data['nama']);
        $stok = htmlspecialchars($data['stok']);
        $harga = htmlspecialchars($data['harga']);
        $jenis = htmlspecialchars($data['jenis']);

        $name2 = str_replace(' ', '_', $nama);

        $img = upload();
        if( !$img){
            return false;
        }

        $inputmenu = "UPDATE tbl_menu SET
            id_menu='$id', nama='$nama', stok='$stok', harga='$harga', img='$img', jenis='$jenis' WHERE id_menu = '$id'";
            $query = $db->query($inputmenu);

        $edittransaksi = "ALTER TABLE tbl_transaksi CHANGE $name $name2 INT(11)";
        $db->query($edittransaksi);

        return $query;
    }

    public function hapus($id){
        $db = $this->mysqli->conn;
        $tampildat    =mysqli_query($db, "SELECT * FROM tbl_menu WHERE id_menu = '$id'");
        $dat    =mysqli_fetch_array($tampildat);
        $nama = $dat['nama'];
        $name = str_replace(' ', '_', $nama);

        $delmenu = "DELETE FROM tbl_menu WHERE id_menu = '$id'";
            $query = $db->query($delmenu);

        $delcolumn = "ALTER TABLE tbl_transaksi DROP COLUMN $name";
        $db->query($delcolumn);

        return $query;
    }
}

class manipuser extends manipulasi{
    public $mysqli;
    public $query;

    public function tampiluser(){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tbl_user WHERE level = 1 OR level = 2";
        $query = $db->query($sql);
        return $query;
    }

    public function tambahusr($data){
        $db = $this->mysqli->conn;

        $codename = htmlspecialchars($data['codename']);
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $level = htmlspecialchars($data['level']);

        $inputuser = "INSERT INTO tbl_user VALUES
            ('$codename','$username','$password','$level')";
            $query = $db->query($inputuser);

        return $query;
    }

    public function editusr($data, $id){
        $db = $this->mysqli->conn;

        $codename = htmlspecialchars($data['codename']);
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $level = htmlspecialchars($data['level']);

        $edituser = "UPDATE tbl_user SET
            codename = '$codename', username = '$username', pass = '$password', level = '$level' WHERE codename = '$id'";
            $query = $db->query($edituser);
        return $query;
    }

    public function hapususr($id){
        $db = $this->mysqli->conn;
        $deluser = "DELETE FROM tbl_user WHERE codename = '$id'";
            $query = $db->query($deluser);

        return $query;
    }

}

class reset{
    public $mysqli;
    public $data;
    public $query;

    function __construct($conn) {
        $this->mysqli = $conn;
    }

    public function reset(){
        $db = $this->mysqli->conn;
        $reset = "DELETE a1 FROM antrian a1 INNER JOIN antrian a2 WHERE a1.status = 'selesai' AND a1.status = a2.status";
            $query = $db->query($reset);

        return $query;
    }
}
?>