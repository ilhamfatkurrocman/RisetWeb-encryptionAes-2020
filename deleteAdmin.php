<?php

include 'dbConnect.php';

$ID_ADMIN = $_GET['id'];
mysqli_query($connect, "delete from USERSADMIN where ID_ADMIN='$ID_ADMIN'");
echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=dashboard.php\">");
