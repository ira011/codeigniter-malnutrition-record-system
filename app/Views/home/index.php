<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-5" style="background-color: #f5f5f5; min-height: 100vh;">
    <div class="row align-items-center">
        <!-- Text Section -->
        <div class="col-md-6 text-center text-md-start px-5">
            <h1 class="display-4 text-primary mb-4">Welcome to the Malnutrition Record System</h1>
            <p class="text-muted mb-4">
                A comprehensive platform designed to track, monitor, and improve the nutritional health of children. 
                Empower communities, caregivers, and health professionals to make data-driven decisions for a healthier future.
            </p>
            <div class="d-flex justify-content-center justify-content-md-start">
                <a href="/children" class="btn btn-success px-4 py-2 me-3">View Children Records</a>
                <a href="/children/dashboard" class="btn btn-outline-primary px-4 py-2">Go to Dashboard</a>
            </div>
        </div>
        <!-- Image Section -->
        <div class="col-md-6 text-center">
            <img src="/images/healthy-children.jpg" alt="Healthy children illustration" class="img-fluid rounded shadow-sm">
        </div>
    </div>

    <div class="mt-5">
        <h2 class="text-center text-primary mb-4">Our Features</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="p-4 bg-white rounded shadow-sm text-center">
                    <h5 class="text-success">Track Growth</h5>
                    <p class="text-muted">Monitor children's weight, height, and nutritional status over time with detailed records.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 bg-white rounded shadow-sm text-center">
                    <h5 class="text-primary">Analyze Data</h5>
                    <p class="text-muted">Gain insights into malnutrition trends to have support and informed decision-making.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-4 bg-white rounded shadow-sm text-center">
                    <h5 class="text-danger">Identify Risks</h5>
                    <p class="text-muted">Identify children at risk of malnutrition early and take proactive steps for their health.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
