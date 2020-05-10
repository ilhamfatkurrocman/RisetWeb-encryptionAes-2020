<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('methodAes128.php');

    // $key = "inikey";
    $cipher = "aes-128-gcm";
    $passfromDB = $_POST['passwordAes'];
    $key = $_POST['key'];
    // $passwordkey = substr(hash('sha256', $key, true), 0, 32);

    $ciphertext = openssl_encrypt($passfromDB, $cipher, $key, $options = 0, $iv, $tag);
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options = 0, $iv, $tag);
   // $decrypted = openssl_decrypt(base64_encode($ciphertext),  $cipher, $key, $options = 0, $tag, OPENSSL_RAW_DATA, $iv);
        // echo "\n";
        // echo $decrypted ;

        if ($original_plaintext != false) {

            $md5type = $original_plaintext;
          //   $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options = 0, $iv, $tag);
            // $stringType =  "Copas MD5 Type to Online tools derypt MD5";
            echo json_encode(array("status" => true, "AES" => $ciphertext, "String" => $md5type));
        } else {
            echo json_encode(array("status" => $original_plaintext, "AES" => $passfromDB));
        }
    
}
