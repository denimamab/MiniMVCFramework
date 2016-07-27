<a href="<?= URI ?>admin/category" class="btn btn-danger ">Back</a>
<h1>Create new category</h1>
<form method="post">
    <?= $form->input('title','Title'); ?>
    <button type="submit" class="btn btn-primary">Save</button>
</form>