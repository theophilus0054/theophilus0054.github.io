<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "mhs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:" .$conn->connect_error);
    }

    $sql = "SELECT npm, nama, alamat, tgl_lhr, jk, email FROM Identitas";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h1 {
            text-align:center;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #dddddd;
        }

        th, td {
            text-align:center;
        }

        .insert a:link, .insert a:visited {
            background-color: #dddddd;
            color: black;
            border-color: black;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .insert a:hover, .insert a:active {
            background color: #dddddd;
            color: white;
            transform: scale(1.2);
            transition: transform 0.3s ease;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Daftar Mahasiswa</h1>
    </header>

    <div class="insert">
        <a href="insert.php">Tambah Data Mahasiswa</a>
        <br><br>
    </div>

    <table>
        <?php
            if ($result->num_rows > 0):
        ?>
            <tr>
                <th>Aksi</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
            </tr>
            <?php
                while($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td>
                        <a href="update.php?id=<?= $row["npm"]; ?>">Ubah</a> | 
                        <a href="delete.php?id=<?= $row["npm"]; ?>">Hapus</a>
                    </td>
                    <td><?= htmlspecialchars($row["npm"]); ?></td>
                    <td><?= htmlspecialchars($row["nama"]); ?></td>
                    <td><?= htmlspecialchars($row["alamat"]); ?></td>
                    <td><?= htmlspecialchars($row["tgl_lhr"]); ?></td>
                    <td><?= htmlspecialchars($row["jk"]); ?></td>
                    <td><?= htmlspecialchars($row["email"]); ?></td>
                </tr>
            <?php
                endwhile;
            ?>
        <?php
            else:
                echo "No Data";
            endif;
        ?>
    </table>
</body>
</html>