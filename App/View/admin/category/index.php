<a href="<?= URI ?>admin" class="btn btn-danger">Back</a>
<a href="<?= URI ?>admin/category/create" class="btn btn-success">New</a>
<h1>Categories</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>Title</strong></td>
        <td><strong>Actions</strong></td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($items as $item) :
    ?>
    <tr>
        <td><?= $item->id ?></td>
        <td><?= $item->title ?></td>
        <td>
            <a href="<?= URI ?>admin/category/edit/<?= $item->id ?>" class="btn btn-primary">Edit</a>
            <form action="<?= URI ?>admin/category/delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $item->id ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
