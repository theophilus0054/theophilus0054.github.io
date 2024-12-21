<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "mhs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:" .$conn->connect_error);
    }

    if(isset($_POST["submit"])) {
        $npm = strtoupper($_POST["npm"]);
        $nama = strtoupper($_POST["nama"]);
        $alamat = $_POST["alamat"];
        $tanggal_lahir = $_POST["tgl_lhr"];
        $jenis_kelamin = $_POST["jk"];
        $email = $_POST["email"];

        
        $sql_cek = "SELECT npm FROM Identitas WHERE npm = '$npm'";
        $result = $conn->query($sql_cek);

        if($result->num_rows > 0){
            echo "<script> alert('NPM sudah ada. Data tidak berhasil diinput')</script>";
        } else {
            $sql = "INSERT INTO Identitas (npm, nama, alamat, tgl_lhr, jk, email) 
                       VALUES ('$npm', '$nama', '$alamat', '$tanggal_lahir', '$jenis_kelamin', '$email')";

            if( $conn->query($sql) === TRUE ) {
                echo "
                    <script>
                        alert('data berhasil dimasukkan!');
                        document.location.href = 'index.php';
                    </script>
                ";
            } else {
                echo "Insert Data Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1 {
            text-align:center;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Isi Data Mahasiswa</h1>
    </header>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="npm">NPM : </label>
                <input type="text" name="npm" id="npm" required><br>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required><br>
            </li>
            <li>
                <label for="alamat">Alamat : </label>
                <input type="text" name="alamat" id="alamat" required><br>
            </li>
            <li>
                <label for="tgl_lhr">Tanggal Lahir : </label>
                <input type="text" name="tgl_lhr" id="tgl_lhr" required><br>
            </li>
            <li>
                <label for="jk">Jenis Kelamin : </label>
                <input type="text" name="jk" id="jk" required><br>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required><br>
            </li>
        </ul>
        <input type="submit" id="submit" name="submit">
    </form>
</body>
</html>