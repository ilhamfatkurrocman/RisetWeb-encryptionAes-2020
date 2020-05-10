<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'risetpenjualan';

$connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connect->connect_error) {
    die('Maaf Gagal:' . $connect->connect_error);
}

// $dbhost = 'localhost';
// $dbuser = 'root';
// $dbpass = '123456789';
// $dbname = 'risetpens';

// $connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// if ($connect->connect_error) {
//     die('Maaf Gagal:' . $connect->connect_error);
// }
