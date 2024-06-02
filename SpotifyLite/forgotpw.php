<?php
$db = new mysqli("localhost", 'root', '', 'spotifylite');

if ($db->connect_errno) {
    die("Koneksi gagal");
}
    

if(isset($_POST['submit_update'])){
    $username = $_POST['username'];
    
    $sql = "UPDATE datalogin SET password=? WHERE username=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $password, $username);
    $stmt->execute();
    if($stmt->affected_rows > 0) {
        // Redirect to login.php after successful update
        header("Location: login.php");
        exit;
    } else {
?>
    <div class="alert alert-danger" role="alert">
        Gagal mengupdate data
    </div>
<?php
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
    <title>Spotify</title>
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

        <p>Silahkan masukkan password baru anda.</p>

        <div class="reset">
            <form action="forgotpw.php" method="POST"> 
                <input type="hidden" name="username" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
                <label>New Password</label>
                <input type="password" placeholder="Password" name="password" id="password">
                <button type="submit" name="submit_update">Update</button>
            </form>
        </div>
    </div>
    </section>
</body>
</html>
