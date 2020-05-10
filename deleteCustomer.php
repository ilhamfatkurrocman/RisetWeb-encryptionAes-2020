<?php

include 'dbConnect.php';

$ID_CUSTOMER = $_GET['id'];
mysqli_query($connect, "delete from CUSTOMER where ID_CUSTOMER='$ID_CUSTOMER'");
echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=dashboard.php\">");
