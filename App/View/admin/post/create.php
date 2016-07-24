<h1>Create new post</h1>
<form method="post">
    <?= $form->input('title','Title'); ?>
    <?= $form->input('content','Content',['type'=>'textarea']); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>