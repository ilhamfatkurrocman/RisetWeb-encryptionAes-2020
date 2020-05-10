<?php
if($_SERVER['REQUEST_METHOD']=='POST') {


    $response = array();
    $value = false;
    
    @$TA_ID = $_POST['TA_ID'];
    @$TA_KOTA = $_POST['TA_KOTA'];
    @$TA_NAMA = $_POST['TA_NAMA'];
    @$TA_JK = $_POST['TA_JK'];
    @$TA_TGL_LAHIR = $_POST['TA_TGL_LAHIR'];
    @$TA_USIA = $_POST['TA_USIA'];
    @$TA_ALAMAT = $_POST['TA_ALAMAT'];
    @$TA_TELP = $_POST['TA_TELP'];
    @$TA_FOTO = $_POST['TA_FOTO'];                            //FOTO PROFILE
    @$TA_EMAIL = $_POST['TA_EMAIL'];
    @$TA_USERNAME = $_POST['TA_USERNAME'];
    @$TA_PASSWORD = md5($_POST['TA_PASSWORD']);
    @$TA_BERKAS = $_POST['TA_BERKAS'];                        //FOTO PORTFOLIO
    @$TA_DESKRIPSI = $_POST['TA_DESKRIPSI'];
    @$TA_STATUS_VERIF = $_POST['TA_STATUS_VERIF'];
    @$TA_KD_VERIF = $_POST['TA_KD_VERIF'];
    @$TA_FOTO_IDENTITAS = $_POST['TA_FOTO_IDENTITAS'];        //FOTO KTP ATAU KTM
    @$TA_NO_IDENTITAS = $_POST['TA_NO_IDENTITAS'];
    @$TA_ASAL_PENDIDIKAN = $_POST['TA_ASAL_PENDIDIKAN'];

require_once('dbConnect.php');

    $query = "SELECT * FROM user WHERE email = '".$TA_NO_IDENTITAS."'";
    $hasil = mysqli_query($con, $query);
    if($hasil){
    
    $data = mysqli_fetch_array($hasil);

    if($data['TA_NO_IDENTITAS']==$TA_NO_IDENTITAS){
         $response["value"] = false;
     $response["message"] = "No Identitas Sudah Terdaftar";
     echo json_encode($response);
    } else {

    $query_insert = "INSERT INTO PEMILIK_TALENT 
    (TA_ID, TA_KOTA, TA_NAMA, TA_JK, TA_TGL_LAHIR, TA_USIA, TA_ALAMAT, TA_TELP, TA_FOTO, TA_EMAIL, TA_USERNAME, TA_PASSWORD, TA_BERKAS, TA_DESKRIPSI, TA_STATUS_VERIF, TA_KD_VERIF, TA_FOTO_IDENTITAS, TA_NO_IDENTITAS, TA_ASAL_PENDIDIKAN) VALUES 
    ('$TA_ID','$TA_KOTA','$TA_NAMA','$TA_JK','$TA_TGL_LAHIR','$TA_USIA','$TA_ALAMAT','$TA_TELP','$TA_FOTO','$TA_EMAIL','$TA_USERNAME','$TA_PASSWORD','$TA_BERKAS','$TA_DESKRIPSI','$TA_STATUS_VERIF','$TA_KD_VERIF','$TA_FOTO_IDENTITAS','$TA_NO_IDENTITAS','$TA_ASAL_PENDIDIKAN')";

    if(mysqli_query($con,$query_insert)) {
        $response["value"] = true;
        $response["message"] = "Registrasi Berhasil";
        echo json_encode($response);

    } else {
        $response["value"] = false;
        $response["message"] = "oops! Coba lagi!";
        echo json_encode($response);

    }
    }
    }
    
}
    
?>