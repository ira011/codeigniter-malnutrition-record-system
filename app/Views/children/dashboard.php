<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="h3 text-primary">Children Dashboard</h1>
        <p class="text-muted">Monitor the nutritional status of children and track their growth trends with actionable insights.</p>
    </div>

    <div class="row">
        <!-- Growth Trends Chart -->
        <div class="col-lg-8 mb-4">
            <div class="p-4 bg-white rounded shadow-sm">
                <h5 class="text-primary mb-3">Growth Trends</h5>
                <canvas id="growthTrendsChart"></canvas>
            </div>
        </div>

        <!-- Dashboard Insights -->
        <div class="col-lg-4">
            <div class="p-4 bg-white rounded shadow-sm mb-4">
                <h5 class="text-primary mb-3">Quick Insights</h5>
                <p class="mb-2"><strong>Total Children Tracked:</strong> <?= $totalChildren ?></p>
                <p class="mb-2"><strong>Normal Status:</strong> <?= $normalCount ?></p>
                <p class="mb-2"><strong>Underweight:</strong> <?= $underweightCount ?></p>
                <p class="mb-2"><strong>Overweight:</strong> <?= $overweightCount ?></p>
            </div>
            <div class="p-4 bg-white rounded shadow-sm">
                <h5 class="text-primary mb-3">Tips for Healthy Growth</h5>
                <ul class="text-muted">
                    <li>Ensure balanced nutrition with a mix of proteins, carbs, and fats.</li>
                    <li>Encourage physical activity suitable for the child’s age.</li>
                    <li>Schedule regular checkups to monitor growth.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('growthTrendsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= $labels ?>, // Dynamic labels (Months)
            datasets: [
                {
                    label: 'Average Weight (kg)',
                    data: <?= $averageWeights ?>, // Dynamic average weight data
                    backgroundColor: 'rgba(230, 126, 34, 0.7)',
                    borderColor: '#e67e22',
                    borderWidth: 1
                },
                {
                    label: 'Average Height (cm)',
                    data: <?= $averageHeights ?>, // Dynamic average height data
                    backgroundColor: 'rgba(26, 188, 156, 0.7)',
                    borderColor: '#1abc9c',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: '#333',
                        font: {
                            size: 14
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Growth Trends Over Time',
                    font: {
                        size: 18
                    },
                    color: '#333'
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return context.dataset.label + ': ' + context.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Months',
                        color: '#666',
                        font: {
                            size: 14
                        }
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Measurement',
                        color: '#666',
                        font: {
                            size: 14
                        }
                    },
                    grid: {
                        color: '#f0f0f0'
                    }
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>
