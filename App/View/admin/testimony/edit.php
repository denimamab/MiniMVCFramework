<h1>Edit testimony</h1>
<form method="post">
    <?= $form->input('author','Author'); ?>
    <?= $form->input('link','Link'); ?>
    <?= $form->input('content','Content',['type'=>'textarea']); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>