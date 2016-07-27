<h1>Edit page</h1>
<a href="?p=page.single&id=<?= $item->id ?>" target="_blank" class="btn btn-warning">Show</a>
<form method="post">
    <?= $form->input('title','Title'); ?>
    <?= $form->input('content','Content',['type'=>'textarea']); ?>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>