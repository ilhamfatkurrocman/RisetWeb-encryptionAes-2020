<?php
if($_SERVER['REQUEST_METHOD']=='POST') {

require_once('methodAes.php');
    $response = array();
    $value = false;
    
  //  @$id = $_POST['id'];
  @$nama_lengkap = $_POST['nama_lengkap'];
  @$asal_sekolah = $_POST['asal_sekolah'];
  @$tanggal_lahir = $_POST['tanggal_lahir'];
  @$usia = $_POST['usia'];
  @$alamat = $_POST['alamat'];
  @$telp = $_POST['telp'];
  @$email = $_POST['email'];
  @$username = $_POST['username'];
  @$plaintextPassword = md5($_POST['password']);
  
  $encryptedPassword = base64_encode(openssl_encrypt($plaintextPassword, $method, $password, OPENSSL_RAW_DATA, $iv));

require_once('dbConnect.php');


  $query = "SELECT * FROM user WHERE email = '".$email."'";
$hasil = mysqli_query($con, $query);
if($hasil){
    
    $data = mysqli_fetch_array($hasil);

    // $message =  "Sudah ada dalam di dalam keranjang, Silahkan edit di menu keranjang!";
    // echo json_encode($result);
    if($data['email']==$email){
         $response["value"] = false;
     $response["message"] = "Email Sudah Terdaftar";
     echo json_encode($response);
    }   else {

    $query_insert = "INSERT INTO user (nama_lengkap,asal_sekolah,tanggal_lahir,usia,alamat,telp,email,username,password) VALUES ('$nama_lengkap','$asal_sekolah','$tanggal_lahir','$usia','$alamat','$telp','$email','$username','$encryptedPassword')";

     if(mysqli_query($con,$query_insert)) {

        $response["value"] = true;
       $response["message"] = "Registrasi Berhasil";
       echo json_encode($response);
  } else {
  
       $response["value"] = false;
       $response["message"] = "oops! Coba lagi!";
       echo json_encode($response);

  }
    // echo json_encode(array("value" => $value, "message" => $message, "result" => $result));
  }
    

  }
    
}
    
?>