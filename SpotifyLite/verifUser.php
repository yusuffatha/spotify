<?php
$db = new mysqli("localhost", 'root', '', 'spotifylite');

if ($db->connect_errno) {
    die("Koneksi gagal");
}

// Check if the form is submitted
if(isset($_POST['check'])) {
    // Retrieve the submitted username
    $username = $_POST['username'];

    // Query to check if the username exists in the database
    $sql = "SELECT Id FROM datalogin WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the username exists
    if($result->num_rows > 0) {
        // If username is found, fetch the id
        $row = $result->fetch_assoc();
        $id = $row['id'];

        // Redirect to reset password page with username and id
        header("Location: forgotpw.php");
        exit();
    } else {
        // If username is not found, display notification
        echo "<script>alert('Username tidak ditemukan');</script>";
    }

    // Close statement and database connection
    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.html">
                <img src="spo-logo.png">
            </a>
        </div>
    </header>

    <section>

    <div class="main">
        <h2> Reset Password</h2>

        <p>Untuk melakukan perubahan password yang lupa, Anda perlu memasukkan Username atau nama pengguna anda.</p>

        <div class="reset">
            <form action="verifUser.php" method="POST">
                <label>Username</label>
                <input type="text" placeholder="Username" name="username" id="username">
                <button type="submit" name="check">Check</button>
            </form>
        </div>
    </div>
    </section>
</body>
</html>
