 <?php
//     @ob_start();
//  error_reporting(0);
//     session_start();
    include('dbConnect.php');
    include('methodAes.php');

    $username = $_POST['username'];
   // $email = $_POST['email'];
    @$plaintextPassword = $_POST['password'];

    $encryptedPassword = base64_encode(openssl_encrypt($plaintextPassword, $method, $password, OPENSSL_RAW_DATA, $iv));

// $sql = "SELECT * FROM usersadmin WHERE username = '" . $username . "' AND password = '" . $encryptedPassword . "'";
    $sql = "SELECT * FROM usersadmin WHERE (email = '" . $username . "' OR username = '" . $username . "') AND password = '" . $encryptedPassword . "'";
    $result = mysqli_query($connect, $sql);
    $countResult = mysqli_num_rows($result);

    if($result){
        if ($countResult == 1) {
            $row = mysqli_fetch_array($result);
            $tes = $row['username'];
            $tes = $row['email'];
        
                echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=dashboard.php\">");
        } else {
        // echo ("<META HTTP-EQUIV=\"Refresh\"CONTENT=\"0;URL=index.php\">");
?>
    <script>
        alert('Maaf username dan password yang di masukkan salah.');
        document.location = "index.php";
    </script>
<?php
        }
   // echo 'ERROR 01';
    }
   // echo 'ERROR 02';
?>
