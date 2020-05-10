<?php


if($_SERVER['REQUEST_METHOD']=='POST') {
    
    require_once('methodAes.php');

$passfromDB = $_POST['passwordAes'];
$key = $_POST['key'];
$passwordkey = substr(hash('sha256', $key, true), 0, 16);

$decrypted = openssl_decrypt(base64_decode($passfromDB), $method, $passwordkey, OPENSSL_RAW_DATA, $iv);

if($decrypted != false){
    $decString = $decrypted;
    $stringType =  "Deskripsi Berhasil";
     echo json_encode(array("status" => true, "AES" => $passfromDB, "DESC" => $decString,"String"=>$stringType ));

} else {
         echo json_encode(array("status" => $decrypted, "AES" => $passfromDB));

}



}
?>