<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High-Risk Cases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">High-Risk Cases</h1>

        <div class="row text-center mb-4">
            <div class="col-md-4">
                <h5>Total High-Risk Cases</h5>
                <p class="fs-4"><?= $totalCases ?></p>
            </div>
            <div class="col-md-4">
                <h5>Severe Cases</h5>
                <p class="fs-4"><?= $severeCases ?></p>
            </div>
            <div class="col-md-4">
                <h5>Moderate Cases</h5>
                <p class="fs-4"><?= $moderateCases ?></p>
            </div>
        </div>

        <canvas id="barangayChart" height="100"></canvas>
        <script>
            const barangayData = <?= json_encode($barangayDistribution) ?>;
            const labels = barangayData.map(item => item.barangay);
            const counts = barangayData.map(item => item.count);

            new Chart(document.getElementById('barangayChart'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'High-Risk Cases per Barangay',
                        data: counts,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <h3 class="mt-5">High-Risk Cases List</h3>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age (months)</th>
                    <th>Gender</th>
                    <th>BMI</th>
                    <th>Severity</th>
                    <th>Barangay</th>
                    <th>Last Intervention Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($highRiskChildren as $child): ?>
                    <tr>
                        <td><?= $child['name'] ?></td>
                        <td><?= $child['age'] ?></td>
                        <td><?= $child['gender'] ?></td>
                        <td><?= $child['bmi'] ?></td>
                        <td><?= $child['severity'] ?></td>
                        <td><?= $child['barangay'] ?></td>
                        <td><?= $child['last_intervention_date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

      
        
    </div>
</body>
</html>

<?= $this->endSection() ?>
