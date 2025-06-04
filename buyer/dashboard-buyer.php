<?php
session_start();
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Pengguna';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F5F6FA;
            margin: 0;
        }
        .content {
            padding: 2rem;
        }
        .breadcrumb {
            color: #6B7280;
            font-size: 14px;
            margin-bottom: 1rem;
        }
        .welcome-text {
            color: #2D2D2D;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .tab-active {
            border-bottom: 2px solid #10B981;
            color: #10B981;
            font-weight: 600;
        }
        .tab-inactive {
            color: #6B7280;
            font-weight: 400;
        }
        .quick-action-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            text-align: center;
        }
        .quick-action-card i {
            color: #9CA3AF;
            font-size: 24px;
        }
        .quick-action-card h3 {
            color: #2D2D2D;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .quick-action-card p {
            color: #6B7280;
            font-size: 14px;
            margin-bottom: 1rem;
        }
        .quick-action-card button {
            background-color: #10B981;
            color: #FFFFFF;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }
        .quick-action-card button:hover {
            background-color: #059669;
        }
        .section-title {
            color: #10B981;
            font-size: 20px;
            font-weight: 600;
        }
        .order-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .order-item:last-child {
            margin-bottom: 0;
        }
        .order-item .icon {
            width: 40px;
            height: 40px;
            background-color: #E5E7EB;
            border-radius: 8px;
        }
        .order-item .details h3 {
            color: #2D2D2D;
            font-size: 16px;
            font-weight: 600;
        }
        .order-item .details p {
            color: #6B7280;
            font-size: 14px;
        }
        .order-item .status p {
            color: #6B7280;
            font-size: 14px;
        }
        .recommendation-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
        }
        .recommendation-card .image {
            width: 100%;
            height: 120px;
            background-color: #E5E7EB;
            border-radius: 8px;
        }
        .recommendation-card h3 {
            color: #2D2D2D;
            font-size: 16px;
            font-weight: 600;
        }
        .recommendation-card p {
            color: #6B7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="content">
        <h1 class="welcome-text">Selamat Datang, <?php echo htmlspecialchars($nama); ?>!</h1>

        <!-- Quick Actions -->
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="quick-action-card">
                <i class="fas fa-search mb-2"></i>
                <h3>Cari Produk</h3>
                <p>Telusuri barang ramah lingkungan.</p>
                <a href="product-search.html" class="mt-2 inline-block">
                    <button type="button">Cari</button>
                </a>
            </div>
            <div class="quick-action-card">
                <i class="fas fa-box-open mb-2"></i>
                <h3>Lacak Pesanan</h3>
                <p>Lihat status pesanan Anda.</p>
                <a href="track-order.html" class="mt-2 inline-block">
                    <button type="button">Lacak</button>
                </a>
            </div>
            <div class="quick-action-card">
                <i class="fas fa-comment-dots mb-2"></i>
                <h3>Pesan</h3>
                <p>Obrolan dengan penjual.</p>
                <button class="mt-2">Buka Obrolan</button>
            </div>
            <div class="quick-action-card">
                <i class="fas fa-heart mb-2"></i>
                <h3>Favorit</h3>
                <p>Lihat produk yang disimpan.</p>
                <button class="mt-2">Lihat</button>
            </div>
        </div>

        <!-- Recent Orders -->
        <h2 class="section-title mb-4">Pesanan Terbaru</h2>
        <div class="order-card mb-6">
            <div class="order-item">
                <div class="flex items-center space-x-4">
                    <div class="icon"></div>
                    <div class="details">
                        <h3>Jaket Denim Eco</h3>
                        <p>Dikirim</p>
                    </div>
                </div>
                <div class="status text-right">
                    <p>12 Mei 2024</p>
                    <p>Rp432.000</p>
                </div>
            </div>
            <div class="order-item">
                <div class="flex items-center space-x-4">
                    <div class="icon"></div>
                    <div class="details">
                        <h3>Botol Air Reusable</h3>
                        <p>Diterima</p>
                    </div>
                </div>
                <div class="status text-right">
                    <p>8 Mei 2024</p>
                    <p>Rp160.000</p>
                </div>
            </div>
            <div class="order-item">
                <div class="flex items-center space-x-4">
                    <div class="icon"></div>
                    <div class="details">
                        <h3>Tas Katun Organik</h3>
                        <p>Diproses</p>
                    </div>
                </div>
                <div class="status text-right">
                    <p>15 Mei 2024</p>
                    <p>Rp240.000</p>
                </div>
            </div>
        </div>

        <!-- Recommended for You -->
        <h2 class="section-title mb-4">Rekomendasi untuk Anda</h2>
        <div class="grid grid-cols-3 gap-4">
            <div class="recommendation-card">
                <div class="image mb-2"></div>
                <h3 class="text-lg font-semibold">Lampu LED Hemat Energi</h3>
                <p class="text-sm text-gray-600">Lampu LED yang tahan lama dan hemat energi untuk rumah Anda.</p>
                <p class="text-sm font-semibold text-green-500">Rp120.000</p>
            </div>
            <div class="recommendation-card">
                <div class="image mb-2"></div>
                <h3 class="text-lg font-semibold">Botol Minum Stainless</h3>
                <p class="text-sm text-gray-600">Botol minum ramah lingkungan yang dapat digunakan kembali.</p>
                <p class="text-sm font-semibold text-green-500">Rp85.000</p>
            </div>
            <div class="recommendation-card">
                <div class="image mb-2"></div>
                <h3 class="text-lg font-semibold">Tas Belanja Lipat</h3>
                <p class="text-sm text-gray-600">Tas belanja praktis yang dapat dilipat dan digunakan berulang kali.</p>
                <p class="text-sm font-semibold text-green-500">Rp50.000</p>
            </div>
        </div>
    </div>
</body>
</html>