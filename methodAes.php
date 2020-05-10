<?php
$password = 'PuspitaProTaApiSecret';
// $method = 'aes-256-cbc';
$method = 'aes-128-cbc';

$password = substr(hash('sha256', $password, true), 0, 16);
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);



?>