<?php
include('../../src/config/db.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

// Cek apakah username sudah ada
$checkQuery = "SELECT * FROM users WHERE username = ?";
$checkStmt = mysqli_prepare($conn, $checkQuery);
mysqli_stmt_bind_param($checkStmt, 's', $username);
mysqli_stmt_execute($checkStmt);
$checkResult = mysqli_stmt_get_result($checkStmt);

if (mysqli_num_rows($checkResult) > 0) {
    echo "<script>alert('Username sudah terdaftar. Silakan pilih username lain.'); window.location='register.php';</script>";
} else {
    // Username belum ada → lanjut insert
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = "INSERT INTO users (username, password) VALUES (?, ?)";
    $insertStmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($insertStmt, 'ss', $username, $password_hash);
    mysqli_stmt_execute($insertStmt);

    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
}
 echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Dimsum Admin</title>
    <link rel="stylesheet" href="../dist/assets/css/style.css"> <!-- pakai CSS kamu -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 300px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .form-container p {
            margin-top: 10px;
            font-size: 14px;
        }

        .form-container a {
            color: #007BFF;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Daftar Akun Admin Dimsum</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required> <br>
            <input type="password" name="password" placeholder="Password" required> <br>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
