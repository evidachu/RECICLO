<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Pembeli';
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'User';
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciclo - Seller Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F5F6FA;
            margin: 0;
        }
        .sidebar {
            background-color: #FFFFFF;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 20%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .logo {
            color: #2D2D2D;
            font-size: 24px;
            font-weight: 700;
        }
        .sidebar ul li {
            color: #6B7280;
            font-size: 16px;
            font-weight: 400;
        }
        .sidebar ul li i {
            font-size: 18px;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background-color 0.2s;
        }
        .sidebar ul li a:hover {
            background-color: #F5F6FA;
        }
        .sidebar ul li a.active {
            background-color: #10B981;
            color: #FFFFFF;
        }
        .content {
            margin-left: 20%;
            width: 80%;
            height: 100vh;
        }
        .footer {
            background-color: #FFFFFF;
            color: #6B7280;
            font-size: 14px;
            padding: 1rem;
            border-top: 1px solid #E5E7EB;
        }
    </style>
</head>
<body>
    <!-- Fixed Sidebar -->
    <div class="sidebar">
        <div>
            <div class="logo p-4">Reciclo</div>
            <ul class="space-y-2 p-4">
                <li>
                    <a href="dashboard-seller.php" target="mainContent" class="flex items-center space-x-4" onclick="setActiveLink(this)">
                        <i class="fas fa-home w-5 text-center"></i>
                        <span class="flex-1">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="listings.html" target="mainContent" class="flex items-center space-x-4" onclick="setActiveLink(this)">
                        <i class="fas fa-store w-5 text-center"></i>
                        <span class="flex-1">Daftar Jual</span>
                    </a>
                </li>
                <li>
                    <a href="sales.html" target="mainContent" class="flex items-center space-x-4" onclick="setActiveLink(this)">
                        <i class="fas fa-shopping-bag w-5 text-center"></i>
                        <span class="flex-1">Sales</span>
                    </a>
                </li>
                <li>
                    <a href="messages.html" target="mainContent" class="flex items-center space-x-4" onclick="setActiveLink(this)">
                        <i class="fas fa-comments w-5 text-center"></i>
                        <span class="flex-1">Pesan</span>
                    </a>
                </li>
                <li>
                    <a href="payment.html" target="mainContent" class="flex items-center space-x-4" onclick="setActiveLink(this)">
                        <i class="fas fa-wallet w-5 text-center"></i>
                        <span class="flex-1">Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="ratings.html" target="mainContent" class="flex items-center space-x-4" onclick="setActiveLink(this)">
                        <i class="fas fa-star w-5 text-center"></i>
                        <span class="flex-1">Rating</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Profile Info -->
        <div class="footer bg-white border-t p-4 text-gray-700 text-sm">
            <div class="flex items-center space-x-3 mb-3">
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-user text-white"></i>
                </div>
                <div>
                    <div class="font-semibold"><?php echo htmlspecialchars($nama); ?></div>
                    <div class="text-xs text-gray-500"><?php echo htmlspecialchars($username); ?> (<?php echo htmlspecialchars($role); ?>)</div>
                </div>
            </div>
            <a href="../logout.php" class="flex items-center space-x-2 text-red-600 hover:text-red-800 transition-colors">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content">
        <iframe name="mainContent" src="dashboard-seller.php" class="w-full h-full border-none"></iframe>
    </div>

    <script>
        // Set active link styling
        function setActiveLink(element) {
            const links = document.querySelectorAll('.sidebar ul li a');
            links.forEach(link => link.classList.remove('active'));
            element.classList.add('active');
        }

        // Set initial active link based on the current iframe source
        window.onload = function() {
            const iframeSrc = document.querySelector('iframe[name="mainContent"]').src;
            const links = document.querySelectorAll('.sidebar ul li a');
            links.forEach(link => {
                if (link.href === iframeSrc) {
                    link.classList.add('active');
                }
            });
        };
    </script>
</body>
</html>