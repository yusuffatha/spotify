<?php
$db = new mysqli("localhost", 'root', '', 'spotifylite');

if ($db->connect_errno) {
    die("Koneksi gagal");
}

$error = '';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(empty($username) || empty($password) || empty($confirm_password)) {
        $error = 'Harap isi semua kolom';
    } elseif($password !== $confirm_password) {
        $error = 'Password tidak sesuai';
    } else {
        $sql = 'INSERT INTO datalogin (username, password) VALUES (?, ?)';
        $stmt = $db->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            header("location:login.php");
            exit();
        } else {
            $error = 'Gagal mendaftar. Silakan coba lagi.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link rel="stylesheet" href="register.css">
    <link rel="icon" href="assets/spotify-logo.png" type="img/png">
    <style>
        .error-message {
            color: red;
            font-size: 0.60em; /* ukuran font lebih kecil */
            margin-top: 5px;
            margin-left: 110px;
        }
        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 0.30cm;
        }
        section div.main{
            margin: 32px 0;
            padding: 32px;
            width: 734px;
            height: 600px;
            background: #000;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">
            <a href="index.html">
                <img src="foto/spo-logo.png" alt="Logo">
            </a>
        </div>
    </header>

    <section>
        <div class="main">
            <h2>Register to start listening</h2>
        
            <div class="SignUp">
                <form action="register.php" method="POST">
                    <label>Username</label>
                    <input type="text" placeholder="Username" name="username" id="username">

                    <label>New Password</label>
                    <input type="password" placeholder="Password" name="password" id="password">

                    <label>Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password">
                    
                    <?php
                    if (!empty($error)) {
                        echo '<div class="error-message">'.$error.'</div>';
                    }
                    ?>

                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>

            <hr>

            <div class="last">
                <span>already have an account?</span>
                <a href="login.php">Log in</a>
            </div>
        </div>    
    </section>
    <footer>
        <div class="footer-content">
            <p>This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</p>
        </div>
    </footer>
</body>
</html>