<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "mhs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:" .$conn->connect_error);
    }

    $npm = $_GET["id"];
    $sql = "DELETE FROM Identitas WHERE npm = '$npm'";



    if( $conn->query($sql) === TRUE ) {
        echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "Delete Data Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>