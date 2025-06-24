<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-tachometer-alt"></i> <?= ucfirst($page) ?></h1>
</div>

<div class="row">
    <!-- Total Kriteria Card with Graph -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 interactive-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                            <a href="<?= base_url('kriteria')?>" class="text-success">Total Kriteria</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kriteria->total ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes fa-2x text-gray-300 icon-hover"></i>
                    </div>
                </div>
                <div class="graph-hover">
                    <canvas id="kriteriaGraph"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Alternatif Card with Graph -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 interactive-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            <a href="<?= base_url('alternatif')?>" class="text-primary">Total Alternatif</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_alternatif->total ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-table fa-2x text-gray-300 icon-hover"></i>
                    </div>
                </div>
                <div class="graph-hover">
                    <canvas id="alternatifGraph"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Belum Input Nilai Card with Graph -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2 interactive-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                            <a href="<?= base_url('penilaian')?>" class="text-danger">Belum Input Nilai</a>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $belum_input_nilai->total ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times fa-2x text-gray-300 icon-hover"></i>
                    </div>
                </div>
                <div class="graph-hover">
                    <canvas id="nilaiGraph"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Hasil Perhitungan Card with Graph -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2 interactive-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                            <a href="<?= base_url('perhitungan')?>" class="text-info">Hasil Perhitungan</a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calculator fa-2x text-gray-300 icon-hover"></i>
                    </div>
                </div>
                <div class="graph-hover">
                    <canvas id="perhitunganGraph"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Hasil Perangkingan Card with Graph -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2 interactive-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                            <a href="<?= base_url('perangkingan')?>" class="text-warning">Hasil Perangkingan</a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-area fa-2x text-gray-300 icon-hover"></i>
                    </div>
                </div>
                <div class="graph-hover">
                    <canvas id="perangkinganGraph"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for interactivity -->
<style>
    .interactive-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .interactive-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
    }

    .icon-hover:hover {
        color: #4e73df;
        transition: color 0.3s ease-in-out;
    }

    .graph-hover {
        display: none;
        transition: opacity 0.3s ease-in-out;
    }

    .interactive-card:hover .graph-hover {
        display: block;
        opacity: 1;
    }
</style>

<!-- Include Chart.js for graphs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const kriteriaData = <?= json_encode($kriteria_chart) ?>;
        const alternatifData = <?= json_encode($alternatif_chart) ?>;
        const nilaiData = <?= json_encode($nilai_chart) ?>;
        const perhitunganData = <?= json_encode($perhitungan_chart) ?>;
        const perangkinganData = <?= json_encode($perangkingan_chart) ?>;

        function extractLabels(data) {
            return data.map(item => item.label || item.bulan);
        }

        function extractValues(data) {
            return data.map(item => item.value || item.total);
        }

        new Chart(document.getElementById('kriteriaGraph').getContext('2d'), {
            type: 'bar',
            data: {
                labels: extractLabels(kriteriaData),
                datasets: [{
                    label: 'Jumlah Bobot',
                    data: extractValues(kriteriaData),
                    backgroundColor: 'rgba(0, 204, 102, 0.2)',
                    borderColor: 'rgba(0, 204, 102, 1)',
                    borderWidth: 1
                }]
            }
        });

        new Chart(document.getElementById('alternatifGraph').getContext('2d'), {
            type: 'pie',
            data: {
                labels: extractLabels(alternatifData),
                datasets: [{
                    label: 'Jumlah Alternatif',
                    data: extractValues(alternatifData),
                    backgroundColor: ['#007bff', '#28a745', '#ffc107'],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            }
        });


		new Chart(document.getElementById('perhitunganGraph').getContext('2d'), {
            type: 'bar',
            data: {
                labels: extractLabels(perhitunganData),
                datasets: [{
                    label: 'Jumlah Kriteria',
                    data: extractValues(perhitunganData),
                    backgroundColor: 'rgba(0, 204, 102, 0.2)',
                    borderColor: 'rgba(0, 204, 102, 1)',
                    borderWidth: 1
                }]
            }
        });

      

    });
</script>

