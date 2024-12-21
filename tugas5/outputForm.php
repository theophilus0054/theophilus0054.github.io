<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $npm = $_POST["npm"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $tempatLahir = $_POST["tempatLahir"];
        $tanggalLahir = $_POST["tanggalLahir"];
        $jenisKelamin = $_POST["jk"];
        $hobi = $_POST["hobi"];
    } 
    else{
        echo "Data tidak dikirim.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightyellow;
            margin: 0;
            padding: 0;
        }

        .output {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 24px;
            color: #333;
            line-height: 1.5;
        }

        h1 {
            text-align: center;
            font-size: 48px;
            color: #333;
            margin-bottom: 5px;
        }
        .up_case {
            text-transform: uppercase;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Data Diri</h1>
    </header>
    <div class="output">
        <?php
            echo "<div class='up_case'>";
            echo "<strong>NPM:</strong> $npm<br>";
            echo "<strong>Nama:</strong> $nama<br>";
            echo "</div>";
            echo "<strong>Alamat:</strong> $alamat<br>";
            echo "<strong>Tempat Lahir:</strong> $tempatLahir<br>";
            echo "<strong>Tanggal Lahir:</strong> $tanggalLahir<br>";
            echo "<strong>Jenis Kelamin:</strong> $jenisKelamin<br>";
            echo "<strong>Hobi:</strong> $hobi<br>";
        ?>
    </div>
</body>
</html>