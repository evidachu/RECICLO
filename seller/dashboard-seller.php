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
        .welcome {
            font-size: 1.5rem;
            font-weight: 600;
            color: #10b981;
            margin-bottom: 1rem;
        }
        .welcome-text {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1f2937;
        }
         .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
            width: auto;
        }
        .quick-actions .card {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            text-align: center;
        }
        .quick-actions .card i {
            font-size: 1.5rem;
            color: #4b5563;
            margin-bottom: 0.5rem;
        }
        .quick-actions .card p {
            margin: 0;
            color: #4b5563;
        }
        .quick-actions .card button {
            background-color: #4b5563;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            margin-top: 0.5rem;
            cursor: pointer;
        }
        .quick-actions .card button:hover {
            background-color: #374151;
        }
        .listings, .orders, .payments, .messages, .sales, .ratings {
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .listings h3, .orders h3, .payments h3, .messages h3, .sales h3, .ratings h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #10b981;
            margin-bottom: 0.5rem;
        }
        .listings .item, .orders .item {
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e5e7eb;
            gap: 1.5rem; /* Add gap between all flex items */
        }
        .listings .item:last-child, .orders .item:last-child {
            border-bottom: none;
        }
        .listings .item img, .orders .item img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            margin-right: 0.75rem;
        }
        .listings .item .details, .orders .item .details {
            flex-grow: 1;
            display: grid;
            grid-template-columns: 2fr 1.5fr 1fr 1fr;
            gap: 1rem;
            align-items: center;
            padding: 0.5rem 0;
        }
        .listings .item .details > div {
            font-size: 0.875rem;
            color: #1f2937;
        }
        .listings .item .details .status, .orders .item .details .status {
            color: #10b981;
            font-weight: 500;
            background-color: #f0fdf4;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            text-align: center;
        }
        .orders .item .details {
            flex-grow: 1;
            display: grid;
            grid-template-columns: 2fr 1.5fr 1fr 1fr;
            gap: 1rem;
            align-items: center;
            padding: 0.5rem 0;
        }

        .orders .item .details .status {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            text-align: center;
            font-weight: 500;
        }

        .orders .item .details .status.shipped {
            color: #10b981;
            background-color: #f0fdf4;
        }

        .orders .item .details .status.pending {
            color: #f59e0b;
            background-color: #fefce8;
        }

        .listings .item .details .price, .orders .item .details .price {
            color: #6b7280;
        }
        .listings .item .details .stock, .orders .item .details .stock {
            color: #6b7280;
        }
        .listings .item .action, .orders .item .action {
            padding-left: 1rem; /* Add extra padding to separate from status */
            color: #6b7280;
            cursor: pointer;
        }
        .messages .item {
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e5e7eb;
            gap: 1.5rem;
        }

        .messages .item .details {
            flex-grow: 1;
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            gap: 1rem;
            align-items: center;
        }

        .messages .item .status {
            display: flex;
            align-items: center;
            gap: 1rem;
            justify-content: flex-end;
            color: #6b7280;
            font-size: 0.875rem;
        }

        .messages .item .status.new {
            color: #10b981;
        }

        .sales .chart {
            width: 100%;
            height: 200px;
        }
        .ratings .review {
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e5e7eb;
            gap: 1.5rem;
        }
        .ratings .review .details {
            flex-grow: 1;
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            gap: 1rem;
            align-items: center;
        }

        .ratings .review .rating {
            display: flex;
            justify-content: flex-end;
            gap: 0.25rem;
            color: #f59e0b;
            font-size: 0.875rem;
        }

        .payments p {
            margin: 0.25rem 0;
            color: #4b5563;
        }
        .payments button {
            background-color: #4b5563;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            margin-right: 0.5rem;
            margin-top: 0.5rem;
            cursor: pointer;
        }
        .payments button:hover {
            background-color: #374151;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 class="welcome-text">Selamat Datang, seller <?php echo htmlspecialchars($nama); ?>!</h1>
        <div class="quick-actions">
            <div class="card">
                <i class="fas fa-plus"></i>
                <p>Tambah Daftar Jual</p>
                <p>Unggah foto, deskripsi, dan harga.</p>
                <button onclick="window.location.href='add-listings.html'">Tambah</button>
            </div>
            <div class="card">
                <i class="fas fa-edit"></i>
                <p>Kelola Daftar Jual</p>
                <p>Ubah atau hapus item yang terdaftar.</p>
                <button onclick="window.location.href='listings.html'">Lihat Daftra</button>
            </div>
        </div>

<div class="listings">
    <h3>Daftar Jual Anda</h3>
    <div class="item">
        <img src="https://via.placeholder.com/24" alt="Eco Tote Bag">
        <div class="details">
            <div class="product-name">Tas Eco</div>
            <div class="price">Rp 45.000</div>
            <div class="stock">10 stok</div>
            <div class="status">Aktif</div>
        </div>
    </div>
    <div class="item">
        <img src="https://via.placeholder.com/24" alt="Vintage Jacket">
        <div class="details">
            <div class="product-name">Jaket Vintage</div>
            <div class="price">Rp 120.000</div>
            <div class="stock">2 stok</div>
            <div class="status">Aktif</div>
        </div>
    </div>
</div>

        <div class="orders">
            <h3>Pesanan Terbaru</h3>
            <div class="item">
                <img src="https://via.placeholder.com/24" alt="Order">
                <div class="details">
                    <div class="order-id">Pesanan #1023</div>
                    <div class="product">Tas Eco</div>
                    <div class="payment">Dibayar</div>
                    <div class="status shipped">Dikirim</div>
                </div>
            </div>
            <div class="item">
                <img src="https://via.placeholder.com/24" alt="Order">
                <div class="details">
                    <div class="order-id">Pesanan #1022</div>
                    <div class="product">Jaket Vintage</div>
                    <div class="payment">-</div>
                    <div class="status pending">Menunggu</div>
                </div>
            </div>
        </div>

        <div class="messages">
            <h3>Pesan</h3>
            <div class="item">
                <img src="https://via.placeholder.com/24" alt="Dewi Sari">
                <div class="details">
                    <div class="name">Dewi Sari</div>
                    <div class="message">Tertarik pada Tas Eco</div>
                    <div class="status new">
                        <i class="fas fa-circle"></i>
                        <span>Baru</span>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="https://via.placeholder.com/24" alt="Budi Santoso">
                <div class="details">
                    <div class="name">Budi Santoso</div>
                    <div class="message">Menanyakan tentang Jaket Vintage</div>
                    <div class="status">
                        <i class="fas fa-check"></i>
                        <span>Dibaca</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="sales">
            <h3>Ikhtisar Penjualan</h3>
            <canvas id="salesChart" class="chart"></canvas>
        </div>

        <div class="ratings">
            <h3>Peringkat & Ulasan</h3>
            <div class="review">
                <img src="https://via.placeholder.com/24" alt="Dewi Sari">
                <div class="details">
                    <div class="name">Dewi Sari</div>
                    <div class="comment">Penjual hebat, respons cepat!</div>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="review">
                <img src="https://via.placeholder.com/24" alt="Budi Santoso">
                <div class="details">
                    <div class="name">Budi Santoso</div>
                    <div class="comment">Item sesuai deskripsi, direkomendasikan.</div>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Penjualan',
                    data: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60],
                    backgroundColor: '#374151',
                    borderColor: '#374151',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>