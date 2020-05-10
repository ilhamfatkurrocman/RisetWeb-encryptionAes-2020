<?php

include 'dbConnect.php';

$ID_TOKO = $_GET['id'];
mysqli_query($connect, "delete from TOKO where ID_TOKO='$ID_TOKO'");
echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=dashboard.php\">");
