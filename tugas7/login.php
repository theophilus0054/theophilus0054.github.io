<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "mhs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:" .$conn->connect_error);
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cookie = isset($_POST["cookie"]) ? $_POST["cookie"] : null;
        $sqlname = "SELECT username, password from users WHERE username = '$username'";
        $result = $conn->query($sqlname);

        if (!($result->num_rows > 0)) {
            echo "<script> alert('Username tidak ada. Silahkan coba lagi!')</script>";
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                if ($cookie === "cookie") {
                    setcookie("login", "true", time() + 86400, '/');
                }
                session_start();
                $_SESSION['username'] = $username;
                echo "
                <script>
                    alert('Log In berhasil!');
                    document.location.href = 'index.php';
                </script>
                ";
            } else {
                echo "
                <script>
                    alert('Password tidak sesuai. Silahkan coba lagi!');
                </script>
                ";
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
    <title>Login</title>
</head>
<body>
    <div class="container">
    <header>
        <h1>Login</h1>
    </header>
    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" minlength="4" pattern=".{4,}" title="Username must be at least 4 characters long" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" minlength="7" pattern=".{7,}" title="Username must be at least 7 characters long" required>

        <div class="cookie">
            <input type="checkbox" id="cookie" name="cookie" value="cookie">
            <label for="cookie">Remember Me</label>
        </div>

        <button type="submit" name="login">Sign in</button>
    </form>
    <div class="bottom-text">
        <span>
            Don't have an account? <a href="register.php" class="link">Register here</a>
        </span>
    </div>
    </div>
</body>
</html>