<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<h1>Dashboard</h1>
<a href="<?php echo Yii::app()->createUrl('site/laporanRs'); ?>" class="btn btn-primary" target="_blank">
    Laporan Rumah Sakit
</a>

<div class="chart-container">
    <div>
        <h4>Kunjungan /Hari - Bulan <?= date('F') ?></h4>
        <canvas id="chartKunjungan"></canvas>
    </div>
    <div>
        <h4>Tindakan Terbanyak</h4>
        <canvas id="chartTindakan"></canvas>
    </div>
    <div>
        <h4>Obat Terpopuler</h4>
        <canvas id="chartObat"></canvas>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {

    // Kunjungan per Hari
    const kunjunganChart = new Chart(document.getElementById('chartKunjungan'), {
        type: 'line',
        data: {
            labels: <?= json_encode(array_map(function($row) {
                        return date('d', strtotime($row['tanggal']));
                        }, $kunjunganData)) ?>,
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: <?= json_encode(array_column($kunjunganData, 'jumlah')) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true
            }]
        }
    });

    // Tindakan Terbanyak
    const tindakanChart = new Chart(document.getElementById('chartTindakan'), {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($tindakanData, 'nama_tindakan')) ?>,
            datasets: [{
                label: 'Jumlah Tindakan',
                data: <?= json_encode(array_column($tindakanData, 'jumlah')) ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.7)'
            }]
        }
    });

    // Obat Terpopuler
    const obatChart = new Chart(document.getElementById('chartObat'), {
        type: 'pie',
        data: {
            labels: <?= json_encode(array_column($obatData, 'nama_obat')) ?>,
            datasets: [{
                label: 'Jumlah Resep',
                data: <?= json_encode(array_column($obatData, 'jumlah')) ?>,
                backgroundColor: [
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
                ]
            }]
        }
    });

});
</script>
<style>
    .chart-container {
        display: flex;
        gap: 20px; /* Jarak antar chart */
        flex-wrap: wrap; /* Biar responsif: kalau kecil, pindah ke bawah */
        justify-content: center; /* Tengahin semua chart */
    }

    .chart-container canvas {
        width: 400px;
        height: 300px;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }
</style>
