<?php
error_reporting(0);
include "dbConnect.php";
if (isset($_REQUEST['aksi'])) $aksi = $_REQUEST['aksi'];
else $aksi = "";


$sql_id = "select max(id) as id from product WHERE id like '%%' ";
$hasil_id = mysqli_query($connect, $sql_id);
if (mysqli_num_rows($hasil_id) > 0) {
    $row = mysqli_fetch_array($hasil_id);
    $idmax = $row['id'];
    $id_urut = (int) substr($idmax, 0, 4);
    $id_urut++;
    $id = "" . sprintf("%01s", $id_urut);
} else {
    $id = "";
}

switch ($aksi) {
    case 'Tambah':
        $id        = $_POST['id'];
        $judul    = $_POST['txtjudul'];
        $pengarang    = $_POST['txtpengarang'];
        $jumlah    = $_POST['txtjumlah'];
        $harga    = $_POST['txtharga'];
        $barcode = $_POST['txtbarcode'];

        $tipe    = $_FILES['filefoto']['type'];
        if ($tipe == 'image/gif' || $tipe == 'image/png' || $tipe == 'image/jpeg') {

            $ukuran    = $_FILES['filefoto']['size'];
            if ($ukuran < 100000) {
                //buat folder foto
                if (!file_exists("images")) {
                    mkdir("images");
                }
                $asal    = $_FILES['filefoto']['tmp_name'];
                $tujuan    = "images/" . $_FILES['filefoto']['name'];
                // $img_url = "http://hamtaroo.000webhostapp.com/RisetApiProduct/" . $tujuan;
                $img_url = "C://xampp/htdocs/RISET-PENS-2020/" . $tujuan;
                move_uploaded_file($asal, $tujuan);

                $str = "INSERT INTO produk (id_produk,judul_produk,pengarang_produk,jumlah_produk,harga_produk,gambar,barcode)VALUES('$id', '$judul', '$pengarang', '$harga','$jumlah','$img_url','$barcode')";
                $query = mysqli_query($connect, $str);

                if ($query) {
                    echo "<script>alert('Berhasil')</script>";
                } else {
                    echo "<script>alert('Gagal')</script>";
                }
            } else {
                echo "<script>alert('Gambar terlalu besar')</script>";
            }
        } else {
            echo "<script>alert('Type harus gambar')</script>";
        }

        break;
    case "Update":

        $id        = $_POST['txtid'];
        $judul    = $_POST['txtjudul'];
        $pengarang    = $_POST['txtpengarang'];
        $harga    = $_POST['txtharga'];
        $jumlah    = $_POST['txtjumlah'];

        if (isset($_POST['cbcek'])) $cek = $_POST['cbcek'];
        else $cek = "";

        if ($cek == '1') {
            //hapus foto lama
            list($foto) = mysqli_fetch_row(mysqli_query($connect, "SELECT gambar FROM product WHERE id = '$id'"));
            if (file_exists($foto)) {
                unlink($foto);
            }
            $asal    = $_FILES['filefoto']['tmp_name'];
            $tujuan    = "images/" . $_FILES['filefoto']['name'];
            move_uploaded_file($asal, $tujuan);
            $str = "UPDATE product SET gambar='$tujuan', judul='$judul', pengarang='$pengarang', harga='$harga', jumlah='$jumlah' WHERE id = '$id' ";
            $query = mysqli_query($connect, $str);
        } else {
            $str = "UPDATE product SET judul='$judul', pengarang='$pengarang', harga='$harga', jumlah='$jumlah' WHERE id = '$id' ";
            $query = mysqli_query($connect, $str);
        }

        if ($query == true) {
            echo "<script>alert('Berhasil')</script>";
        } else {
            echo "<script>alert('Gagal')</script>";
        }

        break;

    case "Hapus":
        $id = $_GET['id'];
        list($foto) = mysqli_fetch_row(mysqli_query($connect, "SELECT gambar FROM product WHERE id = '$id'"));
        if (file_exists($foto)) {
            unlink($foto);
        }
        $query = mysqli_query($connect, "DELETE FROM product WHERE id = '$id'");

        if ($query == true) {
            echo "<script>alert('Berhasil')</script>";
        } else {
            echo "<script>alert('Gagal')</script>";
        }
        break;
}
?>
    <!--<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=product.php\">-->
    <meta http-equiv="refresh" content="1;URL=product.php">