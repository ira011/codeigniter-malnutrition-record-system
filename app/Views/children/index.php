<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="d-flex flex-column" style="min-height: 100vh;">
    <div class="container flex-grow-1 py-5">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Children List</h2>
            <a href="<?= base_url('/children/create') ?>" class="btn btn-success">+ Add Child</a>
        </div>

        <?php if (empty($children)): ?>
            <div class="alert alert-info text-center">
                No children records found. Click <a href="<?= base_url('/children/create') ?>">here</a> to add a new child.
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($children as $child): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?= esc($child['name']); ?></h5>
                                <p class="card-text"><strong>Age:</strong> <?= esc($child['age']); ?> months</p>
                                <p class="card-text"><strong>Weight:</strong> <?= esc($child['weight']); ?> kg</p>
                                <p class="card-text"><strong>Height:</strong> <?= esc($child['height']); ?> cm</p>
                                <p class="card-text"><strong>Gender:</strong> <?= esc($child['gender']); ?></p>
                                <p class="card-text"><strong>BMI:</strong> <?= esc($child['bmi']); ?></p>
                                <p class="card-text"><strong>Severity:</strong> 
                                    <span class="badge 
                                        <?= $child['severity'] === 'Severe' ? 'bg-danger' : 'bg-warning'; ?>">
                                        <?= esc($child['severity']); ?>
                                    </span>
                                </p>
                                <p class="card-text"><strong>Status:</strong> 
                                    <?php if ($child['status'] === 'Normal'): ?>
                                        <span class="badge bg-success"><?= esc($child['status']); ?></span>
                                    <?php elseif ($child['status'] === 'Underweight'): ?>
                                        <span class="badge bg-warning"><?= esc($child['status']); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-danger"><?= esc($child['status']); ?></span>
                                    <?php endif; ?>
                                </p>
                                <p class="card-text"><strong>Barangay:</strong> <?= esc($child['barangay']); ?></p>
                                <p class="card-text"><strong>Last Intervention:</strong> <?= esc($child['last_intervention_date']); ?></p>
                                <div class="d-flex justify-content-between">
                                    <a href="<?= base_url('/children/edit/' . $child['id']) ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                                    <form action="<?= base_url('children/delete/' . $child['id']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="mb-4 p-3 bg-light rounded shadow-sm">
            <h5 class="text-primary mb-3">Normal Weight and Height Guide</h5>
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Age (Months)</th>
                        <th>Normal Weight (kg)</th>
                        <th>Normal Height (cm)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0-3</td>
                        <td>3.2 - 6.0</td>
                        <td>49 - 61</td>
                    </tr>
                    <tr>
                        <td>4-6</td>
                        <td>5.5 - 8.0</td>
                        <td>58 - 68</td>
                    </tr>
                    <tr>
                        <td>7-9</td>
                        <td>7.0 - 9.5</td>
                        <td>65 - 72</td>
                    </tr>
                    <tr>
                        <td>10-12</td>
                        <td>8.5 - 10.5</td>
                        <td>69 - 76</td>
                    </tr>
                    <tr>
                        <td>13-18</td>
                        <td>9.0 - 12.5</td>
                        <td>74 - 82</td>
                    </tr>
                    <tr>
                        <td>19-24</td>
                        <td>10.0 - 14.0</td>
                        <td>79 - 88</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
