<?php
$plaintext = 'My secret message 1234';
$password = '123';
$method = 'aes-256-cbc';
// Must be exact 32 chars (256 bit)
$password = substr(hash('sha256', $password, true), 0, 32);
echo "Password:" . $password . "\n";
// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));
// My secret message 1234
$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);
echo 'plaintext=' . $plaintext . "<br>";
echo 'cipher=' . $method . "<br>";
echo 'encrypted to: ' . $encrypted . "<br>";
echo 'decrypted to: ' . $decrypted . "<br>";
echo $iv;
?>