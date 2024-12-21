<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "mhs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:" .$conn->connect_error);
    }

    if (isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        if ($password !== $password2) {
            echo "<script> alert('Password tidak sesuai. Silahkan coba lagi!')</script>";
        } else {
            $encryptPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) 
                       VALUES ('$username', '$encryptPassword')";

            if( $conn->query($sql) === TRUE ) {
                echo "
                    <script>
                        alert('Register berhasil!');
                        document.location.href = 'login.php';
                    </script>
                ";
            } else {
                echo "Register Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logreg.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
    <header>
        <h1>Register</h1>
    </header>
    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" minlength="4" pattern=".{4,}" title="Username must be at least 4 characters long" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" minlength="7" pattern=".{7,}" title="Username must be at least 7 characters long" required>

        <label for="password2">Confirm Password</label>
        <input type="password" id="password2" name="password2" minlength="7" pattern=".{7,}" title="Username must be at least 7 characters long" required>

        <button type="submit" name="register">Sign Up</button>
    </form>
    <div class="bottom-text">
        <span>
            Already have an account? <a href="login.php" class="link">Login here</a>
        </span>
    </div>
    </div>
</body>
</html>