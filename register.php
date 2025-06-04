<?php
session_start();
require 'connection.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        $error = "Username sudah digunakan.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (nama, username, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nama, $username, $password, $role]);

        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        $_SESSION['nama'] = $nama;

        // Replace the existing if condition for redirect
        if ($role === 'admin') {
            header("Location: admin/sidebar-admin.php");
        } elseif ($role === 'seller') {
            header("Location: seller/sidebar-seller.php");
        } else {
            header("Location: buyer/sidebar-buyer.php");
        }
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciclo - Register</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
    <style>
                .toggle-container {
            display: flex;
            justify-content: center;
            margin-top: 1rem;

        }
        .toggle-button {
            display: flex;
            border: 2px solid #8B5CF6;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            width: 600px; /* Increased width to accommodate three options */
        }
        .toggle-option {
            flex: 1;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            font-weight: bold;
            color: #8B5CF6;
            background-color: white;
            transition: background-color 0.3s, color 0.3s;
        }
        .toggle-option.active {
            background-color: #8B5CF6;
            color: white;
        }
        </style>
</head>
<body>
    <div class="container">
        <h2 class="text-2xl font-bold mb-6">Welcome to RECICLO</h2>
        <?php if (!empty($error)) echo "<p class='text-red-500 mb-3'>$error</p>"; ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label>Register as:</label>
                <div class="toggle-container">
                    <div class="toggle-button" id="role-toggle">
                        <div class="toggle-option active" data-role="admin" onclick="selectRole(this)">Admin</div>
                        <div class="toggle-option" data-role="seller" onclick="selectRole(this)">Seller</div>
                        <div class="toggle-option" data-role="buyer" onclick="selectRole(this)">Buyer</div>
                    </div>
                </div>
                <input type="hidden" id="role-hidden" name="role" value="admin">
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fas fa-user"></i></span>
                    <input type="text" id="nama" name="nama" placeholder="Enter your full name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fas fa-user"></i></span>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <span class="input-icon"><i class="fas fa-lock"></i></span>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="footer">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
    <script>
        function selectRole(element) {
            const options = document.querySelectorAll('.toggle-option');
            options.forEach(option => option.classList.remove('active'));
            element.classList.add('active');
            document.getElementById('role-hidden').value = element.getAttribute('data-role');
        }
    </script>
</body>
</html>