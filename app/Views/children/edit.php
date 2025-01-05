<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container py-5 position-relative">
    <h2 class="text-center text-primary mb-4">Edit Child Record</h2>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form action="/children/update/<?= $child['id'] ?>" method="post" class="p-4 rounded shadow-sm bg-white">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label text-primary">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= esc($child['name']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label text-primary">Age (Months)</label>
                        <input type="number" class="form-control" id="age" name="age" value="<?= esc($child['age']); ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="weight" class="form-label text-primary">Weight (kg)</label>
                        <input type="number" class="form-control" id="weight" name="weight" value="<?= esc($child['weight']); ?>" step="0.1" required>
                    </div>
                    <div class="col-md-6">
                        <label for="height" class="form-label text-primary">Height (cm)</label>
                        <input type="number" class="form-control" id="height" name="height" value="<?= esc($child['height']); ?>" step="0.1" required>
                    </div>

                    <div class="col-md-6">
                        <label for="gender" class="form-label text-primary">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="Male" <?= $child['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?= $child['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="barangay" class="form-label text-primary">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" value="<?= esc($child['barangay']); ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="last_intervention_date" class="form-label text-primary">Last Intervention</label>
                        <input type="date" class="form-control" id="last_intervention_date" name="last_intervention_date" value="<?= esc($child['last_intervention_date']); ?>">
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
