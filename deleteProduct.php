<?php

include 'dbConnect.php';

$ID_PRODUK = $_GET['id'];
mysqli_query($connect, "delete from PRODUK where ID_PRODUK='$ID_PRODUK'");
echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=dashboard.php\">");
