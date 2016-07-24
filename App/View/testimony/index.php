<h1>Temoignages</h1>

<?php foreach ($items as $item) : ?>
    <p>
        <?= $item->extract ?>
    </p>
    <a href="<?= $item->url ?>">Lire la suite</a>
<?php endforeach; ?>
