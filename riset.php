<?php
$plaintext = 'tess';
$password = 'mnbvcxzasdfghjkl';
$method = 'aes-256-cbc';

// IV must be exact 16 chars (128 bit)
$iv = "qwertyuioplkjhgf";
// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=

$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));
// My secret message 1234
$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);
echo 'plaintext=' . $plaintext . "<br>";
echo 'cipher=' . $method . "<br>";
echo 'encrypted to: ' . $encrypted . "<br>";
echo 'decrypted to: ' . $decrypted . "<br>";
echo $iv;
