<a href="?p=admin.category.index" class="btn btn-danger">Back</a>
<a href="?p=category.single&id=<?= $item->id ?>" target="_blank" class="btn btn-success">Show</a>
<h1>Edit category</h1>
<form method="post">
    <?= $form->input('title','Title'); ?>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>