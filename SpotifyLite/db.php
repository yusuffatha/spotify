<?php
$db = new mysqli("localhost", 'root', '', 'spotifylite');

if ($db->connect_errno) {
    die("Koneksi gagal");
}

$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan query untuk mencari data di database
$sql = "SELECT * FROM datalogin WHERE username = '$username' AND password = '$password'";
$result = $db->query($sql);

// Periksa apakah hasil query menghasilkan baris data
if ($result->num_rows > 0) {
    header("Location: HomeAfter.php");
    exit;
} else {
    //echo "<script>alert('Username atau password salah.');</script>";
    header("Location: login.php?error=1");
    exit;
}

// Tutup koneksi database
$db->close();
?>

