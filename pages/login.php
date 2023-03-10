<?php
session_start();
// Koneksi ke database
include '../connect.php';

// Atur Variable
$error = "";
$user = "";
$remember = "";

// Cek apakah user mengisi data dengan benar
if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if($user == '' or $pass == '') {
        $error = "<li>Silahkan Masukkan Username dan Password</li>";
    }else{
        $select = "SELECT * FROM login WHERE username = '$user'";
        $query = mysqli_query($connect,$select);
        $read = mysqli_fetch_array($query);

        if($read['username'] == '') {
            $error = "<li>Username Tidak Tersedia</li>";
        }elseif($read['password'] != md5($pass)){
            $error = "<li>Password Tidak Cocok</li>";
        }

        // Membuat Session
        if(empty($error)) {
            $_SESSION['session_user'] = $user; // Server
            $_SESSION['session_pass'] = md5($pass); // Password

            header("location:dashboard.php");
        }
    }
}

// Balikkan user ke Dashboard ketika sudah Login
if(isset($_SESSION['session_user'])) {
    header("location:dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login As Admin</title>
    <link rel="stylesheet" href="../css/style-page.css">
</head>
<body>
    <div class="form-login">
    <div class="center">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="txt-field">
                <input type="text" name="username" id="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt-field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" name="login" id="login" value="Login">
            <div class="signup_link">
                Not a Member? <a href="#">Signup</a>
            </div>
        </form>
    </div>
    </div>
</body>
</html>