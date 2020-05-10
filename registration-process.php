<?php
include 'dbConnect.php';

require_once('methodAes.php');
    $mode = $_GET['mode'];
    if ($mode == 'simpanRegistration') {
        @$nama_lengkap = $_POST['nama_lengkap'];
        @$alamat_lengkap = $_POST['alamat_lengkap'];
        @$bagian = $_POST['bagian'];
        @$telp_admin = $_POST['telp_admin'];
        @$email_admin = $_POST['email_admin'];
        @$username = $_POST['username'];
        @$plaintextPassword = $_POST['password'];

        $encryptedPassword = base64_encode(openssl_encrypt($plaintextPassword, $method, $password, OPENSSL_RAW_DATA, $iv));

        $insert = "INSERT INTO usersadmin (nama_lengkap,alamat_lengkap,bagian,telp_admin,email_admin,username,password) VALUES ('$nama_lengkap','$alamat_lengkap','$bagian','$telp_admin','$email_admin','$username','$encryptedPassword')";
        $hsl = mysqli_query($connect, $insert);

    } elseif ($mode == 'updateRegistration') {
        @$id_admin = $_POST['id_admin'];
        @$nama_lengkap = $_POST['nama_lengkap'];
        @$alamat_lengkap = $_POST['alamat_lengkap'];
        @$bagian = $_POST['bagian'];
        @$telp_admin = $_POST['telp_admin'];
        @$email_admin = $_POST['email_admin'];
        @$username = $_POST['username'];
        @$password = $_POST['password'];

        $update1 = "UPDATE usersadmin SET id_admin='$id_admin', nama_lengkap='$nama_lengkap',alamat_lengkap='$alamat_lengkap',bagian='$bagian',telp_admin='$telp_admin',email_admin='$email_admin', username='$username', password='$password' WHERE id_admin='$id_admin'";
        $upa = mysqli_query($connect, $update1);

    } elseif ($mode == 'simpanCustomer') {
        @$id_customer = $_POST['id_customer'];
        @$nm_customer = $_POST['nm_customer'];
        @$alamat_customer = $_POST['alamat_customer'];
        @$telp_customer = $_POST['telp_customer'];
        @$email_customer = $_POST['email_customer'];
        @$saldo = $_POST['saldo'];
        // @$hassaldo = md5($_POST['saldo']);
        @$username_customer = $_POST['username_customer'];
        @$plaintextPassword = $_POST['password_customer'];

        //HAS PASSWORD AES
        $encryptedPassword = base64_encode(openssl_encrypt($plaintextPassword, $method, $password, OPENSSL_RAW_DATA, $iv));

        $insert = "INSERT INTO customer VALUES ('$id_customer','$nm_customer','$alamat_customer','$telp_customer','$email_customer','$saldo','$username_customer','$encryptedPassword')";
        $hsl = mysqli_query($connect, $insert);

    } elseif ($mode == 'updateCustomer') {
        @$id_customer = $_POST['id_customer'];
        @$nm_customer = $_POST['nm_customer'];
        @$alamat_customer = $_POST['alamat_customer'];
        @$telp_customer = $_POST['telp_customer'];
        @$email_customer = $_POST['email_customer'];
        @$saldo = $_POST['saldo'];
        @$username_customer = $_POST['username_customer'];
        @$password_customer = $_POST['password_customer'];

        $update = "UPDATE customer SET id_customer='$id_customer', nm_customer='$nm_customer', alamat_customer='$alamat_customer', telp_customer='$telp_customer', email_customer='$email_customer', saldo='$saldo', username_customer='$username_customer', password_customer='$password_customer' WHERE id_customer='$id_customer'";
        $up = mysqli_query($connect, $update);

    } elseif ($mode == 'updateSaldo') {
        @$ID_CUSTOMER = $_POST['ID_CUSTOMER'];
        @$NM_CUSTOMER = $_POST['NM_CUSTOMER'];
        @$EMAIL_CUSTOMER = $_POST['EMAIL_CUSTOMER'];
        @$SALDO = $_POST['SALDO'];
        @$SALDO_TOP = $_POST['SALDO_TOP'];

        @$UP = $SALDO + $SALDO_TOP;

        // $encryptedPassword = base64_encode(openssl_encrypt($saldoUpHas, $method, $password, OPENSSL_RAW_DATA, $iv));
        $update = "UPDATE customer SET ID_CUSTOMER='$ID_CUSTOMER', NM_CUSTOMER='$NM_CUSTOMER', EMAIL_CUSTOMER='$EMAIL_CUSTOMER', SALDO='$UP' WHERE ID_CUSTOMER='$ID_CUSTOMER'";
        $upi = mysqli_query($connect, $update);

    } elseif ($mode == 'simpanToko') {
        @$ID_TOKO = $_POST['ID_TOKO'];
        @$ID_ADMIN = $_POST['ID_ADMIN'];
        @$NAMA_TOKO = $_POST['NAMA_TOKO'];
        @$NAMA_PEMILIK_TOKO = $_POST['NAMA_PEMILIK_TOKO'];

        $insertToko = "INSERT INTO TOKO VALUES ('$ID_TOKO','$ID_ADMIN','$NAMA_TOKO','$NAMA_PEMILIK_TOKO')";
        $hslToko = mysqli_query($connect, $insertToko);

    } elseif ($mode == 'updateToko') {
        @$ID_TOKO = $_POST['ID_TOKO'];
        @$ID_ADMIN = $_POST['ID_ADMIN'];
        @$NAMA_TOKO = $_POST['NAMA_TOKO'];
        @$NAMA_PEMILIK_TOKO = $_POST['NAMA_PEMILIK_TOKO'];

        $updateToko = "UPDATE TOKO SET ID_TOKO='$ID_TOKO', ID_ADMIN='$ID_ADMIN', NAMA_TOKO='$NAMA_TOKO', NAMA_PEMILIK_TOKO='$NAMA_PEMILIK_TOKO' WHERE ID_TOKO='$ID_TOKO'";
        $upToko = mysqli_query($connect, $updateToko);

    } elseif ($mode == 'simpanProduct') {
        @$id_produk = $_POST['id_produk'];
        @$id_admin = $_POST['id_admin'];
        @$judul_produk = $_POST['judul_produk'];
        @$pengarang_produk = $_POST['pengarang_produk'];
        @$jumlah_produk = $_POST['jumlah_produk'];
        @$harga_produk = $_POST['harga_produk'];

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
                 $img_url = "http://localhost:82/RISET-PENS-2020/" . $tujuan;
                move_uploaded_file($asal, $tujuan);

                $str = "INSERT INTO product (id,judul,pengarang,harga,jumlah,gambar) VALUES ('$id', '$judul', '$pengarang', '$harga','$jumlah','$img_url')";
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

    }

    echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=dashboard.php\">");

?>
