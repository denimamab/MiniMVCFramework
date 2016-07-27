<a href="<?= URI ?>admin" class="btn btn-danger">Back</a>
<a href="<?= URI ?>admin/testimony/create" class="btn btn-success">New</a>
<h1>Testimonials</h1>
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
            <a href="<?= URI ?>testimony/<?= $item->id ?>" target="_blank" class="btn btn-warning">Show</a>
            <a href="<?= URI ?>admin/testimony/edit/<?= $item->id ?>" class="btn btn-primary">Edit</a>
            <form action="<?= URI ?>admin/testimony/delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $item->id ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
