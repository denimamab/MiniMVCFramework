<h1>Testimonials</h1>
<a href="?p=admin.testimony.create" class="btn btn-success">New</a>
<table class="table table-striped">
    <thead>
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>Author</strong></td>
        <td><strong>Extract</strong></td>
        <td><strong>Actions</strong></td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($items as $item) :
    ?>
    <tr>
        <td><?= $item->id ?></td>
        <td><a href="<?= $item->link ?>" target="_blank"><?= $item->author ?></a></td>
        <td><?= $item->extract ?></td>
        <td>
            <a href="?p=testimony.single&id=<?= $item->id ?>" target="_blank" class="btn btn-warning">Show</a>
            <a href="?p=admin.testimony.edit&id=<?= $item->id ?>" class="btn btn-primary">Edit</a>
            <form action="?p=admin.testimony.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $item->id ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
