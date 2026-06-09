<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    :root {
        --admin-pink: #ec4899;
        --admin-pink-light: #fdf2f8;
        --admin-bg: #f8fafc;
    }

    body { background-color: var(--admin-bg); font-family: 'Inter', sans-serif; }

    .card {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        margin-bottom: 1.5rem;
    }

    .card-header {
        background-color: transparent;
        border-bottom: 1px solid #f1f5f9;
        padding: 1rem 1.25rem;
    }

    .stat-card {
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 110px;
    }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.85rem;
        color: #64748b;
        font-weight: 500;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--admin-pink);
    }

    .stat-icon-circle {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--admin-pink-light);
        color: var(--admin-pink);
        border: 1px solid #fce7f3;
    }

    .chart-box { position: relative; height: 250px; }

    .table-card { border-radius: 15px; overflow: hidden; }
    .table thead th {
        background-color: #ffffff;
        text-transform: none;
        font-weight: 600;
        color: #1e293b;
        border-bottom: 2px solid #f1f5f9;
        padding: 1rem;
    }
    .table tbody td { padding: 1rem; vertical-align: middle; color: #475569; }

    .badge-pending {
        background-color: #fbbf24;
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .btn-detail {
        color: var(--admin-pink);
        border: 2px solid var(--admin-pink);
        background: transparent;
        border-radius: 8px;
        padding: 0.25rem 1rem;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-detail:hover {
        background: var(--admin-pink);
        color: white;
    }

    .search-input {
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
    }
</style>

<div class="container-fluid py-4">
    <h3 class="fw-bold mb-4">Dashboard</h3>

    <div class="row g-3 mb-2">
        <?php
        $stats = [
            ['Total Booking', $totalBooking, 'bi-calendar3'],
            ['Pending', $pending, 'bi-clock'],
            ['Confirmed', $confirmed, 'bi-check-circle'],
            ['Vendor', $totalVendor, 'bi-shop'],
            ['Layanan', $totalLayanan, 'bi-bag'],
            ['User', $totalUser, 'bi-people'],
        ];
        foreach ($stats as $s):
        ?>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card stat-card">
                <div class="stat-header">
                    <span class="stat-label"><?= $s[0] ?></span>
                    <div class="stat-icon-circle"><i class="bi <?= $s[2] ?>"></i></div>
                </div>
                <div class="stat-value"><?= $s[1] ?></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="row g-4 mb-2">
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">Booking per Bulan</div>
                <div class="card-body">
                    <div class="chart-box"><canvas id="bookingChart"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold text-center">Status Booking</div>
                <div class="card-body">
                    <div class="chart-box"><canvas id="statusChart"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-bold">Saldo Masuk</div>
                <div class="card-body">
                    <div class="mb-3">
                        <h4 class="fw-bold text-pink mb-0">Rp <?= number_format($saldoMasuk, 0, ',', '.') ?></h4>
                        <small class="text-muted"><i class="bi bi-circle-fill me-1 text-pink" style="font-size: 8px;"></i> confirmed</small>
                    </div>
                    <div class="chart-box"><canvas id="saldoChart"></canvas></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card table-card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white">
            <h5 class="fw-bold mb-0">Booking Masuk</h5>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control search-input" placeholder="Cari...">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="25%">Tanggal</th>
                        <th width="25%">Status</th>
                        <th width="25%">Total</th>
                        <th width="25%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(!empty($bookingList)): 
                        foreach($bookingList as $row): ?>
                        <tr>
                            <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                            <td><span class="badge-pending text-uppercase"><?= $row['status'] ?></span></td>
                            <td class="fw-bold">Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/booking/detail/'.$row['id']) ?>" class="btn-detail">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr><td colspan="4" class="text-center py-4">Belum ada booking masuk.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
    const bLabels = <?= json_encode(array_map(fn($b) => 'Bulan ' . $b['bulan'], $chartBooking)) ?>;
    const bData = <?= json_encode(array_column($chartBooking, 'total')) ?>;
    
   
    new Chart(document.getElementById('bookingChart'), {
        type: 'bar',
        data: {
            labels: bLabels,
            datasets: [{
                label: 'confirmed',
                data: bData,
                backgroundColor: '#ec4899',
                borderRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [2, 2] }, ticks: { stepSize: 1 } },
                x: { grid: { display: false } }
            }
        }
    });

    
    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: {
            labels: ['Pending', 'Confirmed'],
            datasets: [{
                data: [<?= $pending ?>, <?= $confirmed ?>],
                backgroundColor: ['#f9a8d4', '#ec4899'],
                borderWidth: 0,
                cutout: '70%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } }
        }
    });

    new Chart(document.getElementById('saldoChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'], 
            datasets: [{
                data: [0, 0, 0, 0, 0, <?= $saldoMasuk ?>],
                borderColor: '#ec4899',
                backgroundColor: 'rgba(236, 72, 153, 0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#fff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { display: true, grid: { display: false } },
                x: { display: true, grid: { display: false } }
            }
        }
    });
</script>

<?= $this->endSection() ?>