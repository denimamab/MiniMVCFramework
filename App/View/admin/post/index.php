<h1>Posts</h1>
<a href="?p=admin.post.create" class="btn btn-success">New</a>
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
            <a href="?p=post.single&id=<?= $item->id ?>" target="_blank" class="btn btn-warning">Show</a>
            <a href="?p=admin.post.edit&id=<?= $item->id ?>" class="btn btn-primary">Edit</a>
            <form action="?p=admin.post.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $item->id ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
