<?php
    session_start();

    if (empty($_SESSION) && !isset($_COOKIE['login'])) {
        header("Location: login.php");
        exit();
    }

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
        header {
            display: flex;
            justify-content: space-between; /* Ensures the content is spread out */
            align-items: center; /* Vertically aligns items */
            padding: 10px 20px;
        }

        header h1 {
            text-align: center;
            margin-left: auto;
        }

        header button {
            margin-left: auto; /* Push the button to the right */
            color: white;
            padding: 10px 15px;
            background-color: red;
            border: 3px solid black;
            cursor: pointer;
            border-radius: 4px;
            transition: transform 0.3s ease;
        }

        header button:hover {
            background-color: white;
            color: red;
            border: 3px solid red;
            transform: scale(1.2);
            transition: transform 0.3s ease;
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
            <button onclick="window.location.href='logout.php'">Log Out</button>
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