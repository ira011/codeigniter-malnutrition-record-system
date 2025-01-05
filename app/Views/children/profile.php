<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h2>Profile of <?= esc($child['name']) ?></h2>
<p>Age: <?= esc($child['age']) ?> months</p>
<p>Nutritional Status: <?= esc($child['nutritional_status']) ?></p>
<h3>Growth History</h3>
<ul class="list-group">
    <?php foreach ($history as $record): ?>
        <li class="list-group-item">
            Date: <?= esc($record['recorded_date']) ?> - Weight: <?= esc($record['weight']) ?> kg, Height: <?= esc($record['height']) ?> cm
        </li>
    <?php endforeach; ?>
</ul>
<?= $this->endSection() ?>
