<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "mhs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:" .$conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $npm = $_GET['id'];
        $sql = "SELECT * FROM identitas WHERE npm = '$npm'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $tanggal_lahir = $row['tgl_lhr'];
            $jenis_kelamin = $row['jk'];
            $email = $row['email'];
        }
    }

    if (isset($_POST['submit'])) {
        $npm = $_POST["npm"];
        $nama = strtoupper($_POST["nama"]);
        $alamat = strtoupper($_POST["alamat"]);
        $tanggal_lahir = $_POST["tgl_lhr"];
        $jenis_kelamin = $_POST["jk"];
        $email = $_POST["email"];
        
        $sql = "UPDATE identitas 
                SET nama='$nama', alamat='$alamat', tgl_lhr='$tanggal_lahir', jk='$jenis_kelamin', email='$email' 
                WHERE npm='$npm'";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script>alert('Data berhasil diupdate!');
            document.location.href = 'index.php';
            </script>;
            ";
        } else {
            echo "Update Data Error: " . $sql . "<br>" . $conn->error;
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
        <h1>Update Data Mahasiswa</h1>
    </header>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="npm">NPM : </label>
                <input type="text" name="npm" id="npm" value="<?= htmlspecialchars($row['npm'] ?? '') ?>" readonly><br>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= htmlspecialchars($nama) ?>"><br>
            </li>
            <li>
                <label for="alamat">Alamat : </label>
                <input type="text" name="alamat" id="alamat" required value="<?= htmlspecialchars($alamat) ?>"><br>
            </li>
            <li>
                <label for="tgl_lhr">Tanggal Lahir : </label>
                <input type="text" name="tgl_lhr" id="tgl_lhr" required value="<?= htmlspecialchars($tanggal_lahir) ?>"><br>
            </li>
            <li>
                <label for="jk">Jenis Kelamin : </label>
                <input type="text" name="jk" id="jk" required value="<?= htmlspecialchars($jenis_kelamin) ?>"><br>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= htmlspecialchars($email) ?>"><br>
            </li>
        </ul>
        <input type="submit" id="submit" name="submit">
    </form>
</body>
</html>