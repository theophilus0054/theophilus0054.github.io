<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "mhs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:" .$conn->connect_error);
    }

    if (count($_COOKIE) > 0) {
        setcookie("login", "", time() - 3600);
    }
    session_destroy();

    echo "
    <script>
        alert('Log Out berhasil!');
        document.location.href = 'login.php';
    </script>
    ";

    $conn->close();

    