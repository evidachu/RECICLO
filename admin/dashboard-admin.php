<?php
session_start();
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Admin';
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
    <link href="style.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <!-- batas baru -->
    <!-- Main Content -->
    <div class="content p-6">
        <h1 class="welcome-text mb-4">Selamat Datang, admin <?php echo htmlspecialchars($nama); ?>!</h1>
        <!-- Tabs -->
        <div class="flex space-x-4 border-b mb-6">
            <button class="pb-2 tab-active">Rekap</button>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="stat-card">
                <i class="fas fa-users mb-2"></i>
                <h3>8,245</h3>
                <p>Pengguna aktif bulan ini</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-list mb-2"></i>
                <h3>1,320</h3>
                <p>Daftar produk aktif</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-box mb-2"></i>
                <h3>2,410</h3>
                <p>Pesanan diproses</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-dollar-sign mb-2"></i>
                <h3>$18,900</h3>
                <p>Pendapatan bulan ini</p>
            </div>
        </div>

        <!-- User Activity -->
        <h2 class="section-title mb-4">Aktivitas Pengguna</h2>
        <canvas id="userActivityChart" class="mb-6"></canvas>

        <!-- Recent Reports -->
        <h2 class="section-title mb-4">Laporan Terbaru</h2>
        <div class="report-card">
            <div class="report-item">
                <div class="flex items-center space-x-4">
                    <div class="icon"></div>
                    <div class="details">
                        <p>Laporan #1021</p>
                        <p>Pengguna: ecoGenZ</p>
                    </div>
                </div>
                <div class="status text-right">
                    <p>Daftar Spam</p>
                    <p>Menunggu</p>
                </div>
            </div>
            <div class="report-item">
                <div class="flex items-center space-x-4">
                    <div class="icon"></div>
                    <div class="details">
                        <p>Laporan #1019</p>
                        <p>Pengguna: thriftQueen</p>
                    </div>
                </div>
                <div class="status text-right">
                    <p>Konten Tidak Pantas</p>
                    <p>Selesai</p>
                </div>
            </div>
            <div class="report-item">
                <div class="flex items-center space-x-4">
                    <div class="icon"></div>
                    <div class="details">
                        <p>Laporan #1017</p>
                        <p>Pengguna: greenMSME</p>
                    </div>
                </div>
                <div class="status text-right">
                    <p>Aktivitas Penipuan</p>
                    <p>Dalam Penyelidikan</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('userActivityChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
                datasets: [{
                    label: 'Aktivitas Pengguna',
                    data: [300, 400, 500, 600, 550, 450, 400, 350, 500, 450, 600, 650],
                    backgroundColor: '#8B5CF6',
                    borderColor: '#8B5CF6',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>