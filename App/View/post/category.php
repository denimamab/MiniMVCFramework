<h1>
    <?= $category->title ?>
</h1>

<?php foreach ($items as $item) : ?>

    <h2>
        <?= $item->title ?>
    </h2>
    <p>
        <em>
            <?= $item->category ?>
        </em>
    </p>
    <p>
        <?= $item->extrait ?>
    </p>
    <a href="<?= $item->url ?>">Lire la suite</a>
<?php endforeach; ?>
